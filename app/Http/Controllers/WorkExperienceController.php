<?php

namespace App\Http\Controllers;
use App\Models\WorkExperience; 
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workExperiences = auth()->user()->workExperiences;
        //dd($educations);
        return view('profile.WorkExperience-details.index', compact('workExperiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.WorkExperience-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'nullable|string',
            'start_date' => 'required|date', // Requires a valid date for start_date
            'end_date' => 'nullable|date|after_or_equal:start_date',
           
        ]);
    
        auth()->user()->workExperiences()->create($request->only(['job_title', 'company','start_date', 'end_date']));
    
        return redirect()->route('work-experiences.index')->with('success', 'workExperiences details added successfully.');
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
    public function edit(WorkExperience $workExperience)
    {
        return view('profile.WorkExperience-details.edit', compact('workExperience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkExperience $workExperience)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'nullable|string',
            'start_date' => 'required|date', // Requires a valid date for start_date
            'end_date' => 'nullable|date|after_or_equal:start_date',
           
        ]);
       $workExperience->update($request->only(['job_title', 'company','start_date', 'end_date']));
    
        return redirect()->route('work-experiences.index')->with('success', 'workExperiences details added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (WorkExperience $workExperience)
    {
        $workExperience->delete();
        return redirect()->route('work-experiences.index')->with('success', 'workExperience details deleted successfully.');
    }
}
