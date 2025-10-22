<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Member;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with(['member', 'staff', 'books'])
                    ->latest('l_date')
                    ->paginate(10);
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        $members = Member::where('m_status', 'active')->orderBy('m_name')->get();
        $staff = Staff::orderBy('s_name')->get();
        $books = Book::where('b_available_stock', '>', 0)
                    ->with(['author', 'category'])
                    ->orderBy('b_title')
                    ->get();
        
        return view('loans.create', compact('members', 'staff', 'books'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Member_m_id' => 'required|exists:members,m_id',
            'Staff_s_id' => 'required|exists:staff,s_id',
            'l_date' => 'required|date',
            'l_return_date' => 'required|date|after:l_date',
            'books' => 'required|array|min:1',
            'books.*' => 'exists:books,b_id',
        ]);

        DB::beginTransaction();
        try {
            // Create loan
            $loan = Loan::create([
                'l_id' => Loan::generateId(),
                'l_date' => $validated['l_date'],
                'l_return_date' => $validated['l_return_date'],
                'l_status' => 'borrowed',
                'Member_m_id' => $validated['Member_m_id'],
                'Staff_s_id' => $validated['Staff_s_id'],
            ]);

            // Attach books and update stock
            foreach ($validated['books'] as $bookId) {
                $book = Book::find($bookId);
                
                if ($book->b_available_stock <= 0) {
                    throw new \Exception("Buku {$book->b_title} tidak tersedia!");
                }

                $loan->books()->attach($bookId);
                $book->decrement('b_available_stock');
            }

            DB::commit();

            return redirect()->route('loans.index')
                            ->with('success', 'Peminjaman berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Gagal membuat peminjaman: ' . $e->getMessage());
        }
    }

    public function show(Loan $loan)
    {
        $loan->load(['member', 'staff', 'books.author']);
        return view('loans.show', compact('loan'));
    }

    public function edit(Loan $loan)
    {
        if ($loan->l_status == 'returned') {
            return redirect()->route('loans.index')
                           ->with('error', 'Tidak dapat mengedit peminjaman yang sudah dikembalikan!');
        }

        $members = Member::where('m_status', 'active')->orderBy('m_name')->get();
        $staff = Staff::orderBy('s_name')->get();
        
        return view('loans.edit', compact('loan', 'members', 'staff'));
    }

    public function update(Request $request, Loan $loan)
    {
        if ($loan->l_status == 'returned') {
            return redirect()->route('loans.index')
                           ->with('error', 'Tidak dapat mengupdate peminjaman yang sudah dikembalikan!');
        }

        $validated = $request->validate([
            'member_m_id' => 'required|exists:members,m_id',
            'staff_s_id' => 'required|exists:staff,s_id',
            'l_date' => 'required|date',
            'l_return_date' => 'required|date|after:l_date',
        ]);

        $loan->update($validated);

        return redirect()->route('loans.index')
                        ->with('success', 'Peminjaman berhasil diupdate!');
    }

    public function destroy(Loan $loan)
    {
        if ($loan->l_status == 'borrowed') {
            return redirect()->route('loans.index')
                           ->with('error', 'Tidak dapat menghapus peminjaman yang masih aktif! Kembalikan buku terlebih dahulu.');
        }

        $loan->delete();

        return redirect()->route('loans.index')
                        ->with('success', 'Peminjaman berhasil dihapus!');
    }

    public function return(Loan $loan)
    {
        if ($loan->l_status == 'returned') {
            return redirect()->route('loans.index')
                           ->with('error', 'Buku sudah dikembalikan!');
        }

        DB::beginTransaction();
        try {
            // Update loan status
            $loan->update(['l_status' => 'returned']);

            // Return books to stock
            foreach ($loan->books as $book) {
                $book->increment('b_available_stock');
            }

            DB::commit();

            return redirect()->route('loans.index')
                            ->with('success', 'Buku berhasil dikembalikan!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Gagal mengembalikan buku: ' . $e->getMessage());
        }
    }
}