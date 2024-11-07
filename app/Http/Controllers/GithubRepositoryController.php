<?php

namespace App\Http\Controllers;
use App\Models\GithubRepository; 
use Illuminate\Http\Request;

class GithubRepositoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $githubRepositories = auth()->user()->githubRepositories;
        return view('profile.GithubRepository.index', compact('githubRepositories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.GithubRepository.create');  
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'repo_name' => 'required|string|max:255',
            'repo_url' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
    
        auth()->user()->githubRepositories()->create($request->only(['repo_name', 'repo_url', 'description']));
    
        return redirect()->route('github-repositories.index')->with('success', 'github-repositories details added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GithubRepository $githubRepository)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GithubRepository $githubRepository)
    {
        return view('profile.GithubRepository.edit', compact('githubRepository'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GithubRepository $githubRepository)
    {
       
        $request->validate([
            'repo_name' => 'required|string|max:255',
            'repo_url' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);
    
        $githubRepository->update($request->only(['repo_name', 'repo_url', 'description']));
    
        return redirect()->route('github-repositories.index')->with('success', 'github-repositories details update successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GithubRepository $githubRepository)
    {
        $githubRepository->delete();

    return redirect()->route('github-repositories.index')->with('success', 'Personal details deleted successfully.');
    }
}
