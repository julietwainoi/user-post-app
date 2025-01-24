@extends('layouts.master')
@section('content')
    <!-- Dashboard Heading -->
    <div class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold leading-tight">
                {{ __('Welcome to Your Dashboard') }}
            </h2>
            <p class="mt-2 text-gray-300">
                {{ __("Here's a quick overview of your activities.") }}
            </p>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Logged-In Message -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-6 text-gray-800">
                    <h3 class="text-xl font-semibold">{{ __("You're logged in!") }}</h3>
                    <p class="text-gray-600 mt-2">
                        {{ __("Feel free to explore your dashboard and manage your account.") }}
                    </p>
                </div>
            </div>

            <!-- Example Section (e.g., Stats, Links) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-medium text-gray-800">{{ __("Profile") }}</h4>
                        <p class="text-gray-600 mt-2">
                            {{ __("Manage your account settings and update your profile information.") }}
                        </p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">
                            {{ __("Go to Profile") }}
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-medium text-gray-800">{{ __("Analytics") }}</h4>
                        <p class="text-gray-600 mt-2">
                            {{ __("Get insights on your recent activity and performance.") }}
                        </p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">
                            {{ __("View Analytics") }}
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-6">
                        <h4 class="text-lg font-medium text-gray-800">{{ __("Support") }}</h4>
                        <p class="text-gray-600 mt-2">
                            {{ __("Need help? Contact our support team or browse FAQs.") }}
                        </p>
                        <a href="#" class="inline-block mt-4 text-blue-600 hover:underline">
                            {{ __("Get Support") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
