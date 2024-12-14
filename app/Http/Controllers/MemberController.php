<?php


namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Vom extrage toți membrii din baza de date
    $members = \App\Models\Member::all();

    // Returnăm o view care va afișa lista membrilor
    return view('members.index', compact('members'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Returnăm view-ul cu formularul de adăugare
    return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:members,email',
        'profession' => 'required|string|max:255',
        'company' => 'nullable|string|max:255',
        'linkedin_url' => 'nullable|url',
        'status' => 'nullable|in:active,inactive'
    ]);

    // Dacă nu a fost specificat, punem status default "active"
    if (!isset($validated['status'])) {
        $validated['status'] = 'active';
    }

    Member::create($validated);

    return redirect()->route('members.index')->with('success', 'Membru adăugat cu succes!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));

    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $member->id,
            'profession' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url',
            'status' => 'required|in:active,inactive'
        ]);

        $member->update($validated);

        return redirect()->route('members.index')->with('success', 'Membru actualizat cu succes!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Membru șters cu succes!');
    }
    
}
