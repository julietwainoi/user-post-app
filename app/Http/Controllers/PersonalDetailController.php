<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetail; 
use Illuminate\Http\Request;

class PersonalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalDetail = auth()->user()->personalDetail;
        return view('profile.personal-details.index', compact('personalDetail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.personal-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'location' => 'nullable|string|max:255',
        ]);
    
        auth()->user()->personalDetail()->create($request->only(['name', 'bio', 'location']));
    
        return redirect()->route('personal-details.index')->with('success', 'Personal details added successfully.');
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
    public function edit(PersonalDetail $personalDetail)
{
    //dd($personalDetail); 
    return view('profile.personal-details.edit', compact('personalDetail'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalDetail $personalDetail)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'nullable|string',
        'location' => 'nullable|string|max:255',
    ]);

    $personalDetail->update($request->only(['name', 'bio', 'location']));

    return redirect()->route('personal-details.index')->with('success', 'Personal details updated successfully.');
}

public function destroy(PersonalDetail $personalDetail)
{
    $personalDetail->delete();

    return redirect()->route('personal-details.index')->with('success', 'Personal details deleted successfully.');
}
}
