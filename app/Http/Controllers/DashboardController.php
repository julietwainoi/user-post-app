<?php

namespace App\Http\Controllers;
use App\Models\Education; 
use App\Models\GithubRepository; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function combinedIndex()
    {
        // Fetch GitHub Repositories and Educations for the authenticated user
        $githubRepositories = auth()->user()->githubRepositories;
        $educations = auth()->user()->educations;
        $workExperiences = auth()->user()->workExperiences;

        // Combine the data
        //$combinedData = $githubRepositories->merge($educations);

        // Return a single view with the combined data
        return view('profile.profile-information', compact('githubRepositories', 'educations','workExperiences'));
    }
}
