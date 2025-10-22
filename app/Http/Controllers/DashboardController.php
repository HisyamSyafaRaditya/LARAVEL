<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Loan;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Staff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_books' => Book::count(),
            'total_members' => Member::count(),
            'total_loans' => Loan::count(),
            'active_loans' => Loan::where('l_status', 'borrowed')->count(),
            'overdue_loans' => Loan::where('l_status', 'borrowed')
                                   ->where('l_return_date', '<', now())
                                   ->count(),
            'total_authors' => Author::count(),
            'total_categories' => Category::count(),
            'total_publishers' => Publisher::count(),
            'total_staff' => Staff::count(),
            'available_books' => Book::sum('b_available_stock'),
        ];

        $recent_loans = Loan::with(['member', 'staff', 'books'])
                            ->orderBy('l_date', 'desc')
                            ->limit(5)
                            ->get();

        $overdue_loans = Loan::with(['member', 'books'])
                             ->where('l_status', 'borrowed')
                             ->where('l_return_date', '<', now())
                             ->orderBy('l_return_date', 'asc')
                             ->limit(5)
                             ->get();

        return view('dashboard', compact('stats', 'recent_loans', 'overdue_loans'));
    }
}