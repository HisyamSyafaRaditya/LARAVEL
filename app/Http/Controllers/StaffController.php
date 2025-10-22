<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('s_id', 'desc')->paginate(10);
        return view('staff.index', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            's_name' => 'required|string|max:50',
            's_email' => 'required|email|max:50|unique:staff,s_email',
            's_phone' => 'required|string|max:15',
            's_position' => 'required|string|max:10',
            's_join_date' => 'required|date',
        ]);

        $validated['s_id'] = Staff::generateId();
        
        Staff::create($validated);

        return redirect()->route('staff.index')
                        ->with('success', 'Staff berhasil ditambahkan!');
    }

    public function show(Staff $staff)
    {
        $staff->load('loans.member');
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            's_name' => 'required|string|max:50',
            's_email' => 'required|email|max:50|unique:staff,s_email,' . $staff->s_id . ',s_id',
            's_phone' => 'required|string|max:15',
            's_position' => 'required|string|max:10',
            's_join_date' => 'required|date',
        ]);

        $staff->update($validated);

        return redirect()->route('staff.index')
                        ->with('success', 'Staff berhasil diupdate!');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('staff.index')
                        ->with('success', 'Staff berhasil dihapus!');
    }
}