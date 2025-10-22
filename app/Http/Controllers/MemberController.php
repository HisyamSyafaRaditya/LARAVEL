<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('m_id', 'desc')->paginate(10);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'm_name' => 'required|string|max:50',
            'm_email' => 'required|email|max:50|unique:members,m_email',
            'm_phone' => 'required|string|max:15',
            'm_address' => 'required|string|max:100',
            'm_join_date' => 'required|date',
            'm_status' => 'required|in:active,inactive',
        ]);

        // Generate next member ID
        $lastMember = Member::orderBy('m_id', 'desc')->first();
        $nextId = $lastMember ? 
            'M' . str_pad((intval(substr($lastMember->m_id, 1)) + 1), 7, '0', STR_PAD_LEFT) : 
            'M0000001';
        
        $validated['m_id'] = $nextId;

        $validated['m_id'] = Member::generateId();
        
        Member::create($validated);

        return redirect()->route('members.index')
                        ->with('success', 'Member berhasil ditambahkan!');
    }

    public function show(Member $member)
    {
        $member->load('loans.books');
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'm_name' => 'required|string|max:50',
            'm_email' => 'required|email|max:50|unique:members,m_email,' . $member->m_id . ',m_id',
            'm_phone' => 'required|string|max:15',
            'm_address' => 'required|string|max:100',
            'm_join_date' => 'required|date',
            'm_status' => 'required|in:active,inactive',
        ]);

        $member->update($validated);

        return redirect()->route('members.index')
                        ->with('success', 'Member berhasil diupdate!');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')
                        ->with('success', 'Member berhasil dihapus!');
    }
}