<?php

namespace App\Http\Controllers;
use App\Models\Education; 
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $educations = auth()->user()->educations;
        //dd($educations);
        return view('profile.Education-details.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.Education-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
       
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'nullable|string',
            'year_of_graduation' => 'nullable|string|max:255',
        ]);
    
        auth()->user()->educations()->create($request->only(['degree', 'institution', 'year_of_graduation']));
    
        return redirect()->route('educations.index')->with('success', 'Education details added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('profile.Education-details.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'nullable|string',
            'year_of_graduation' => 'nullable|string|max:255',
        ]);
    
        $educations()->update($request->only(['degree', 'institution', 'year_of_graduation']));
    
        return redirect()->route('educations.index')->with('success', 'Education details added successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('educations.index')->with('success', 'Education details deleted successfully.');
    }

    
}
