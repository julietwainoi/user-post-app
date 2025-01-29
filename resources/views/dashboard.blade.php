@extends('layouts.master')

@section('content')
<!-- Dashboard Heading -->
<div class="bg-black text-white py-12 shadow-lg">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10 text-center">
        <h2 class="text-3xl font-bold text-gray-100">
            {{ __('Welcome to Your Dashboard') }}
        </h2>
       
    </div>
</div>



            <!-- Cards Section (Smaller Cards) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                
                <!-- Profile Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden w-64 hover:shadow-lg transition duration-300">
                    <div class="p-4 text-center">
                        <h4 class="text-lg font-medium text-gray-900">{{ __("Profile") }}</h4>
                        <p class="text-gray-600 mt-2 text-sm">
                            {{ __("Manage your account settings.") }}
                        </p>
                        <a href="{{route('profile.edit')}}" class="inline-block mt-4 text-blue-600 text-sm font-medium hover:text-blue-800 transition duration-200">
                            {{ __("Go to Profile →") }}
                        </a>
                    </div>
                </div>

                <!--make post Card -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden w-64 hover:shadow-lg transition duration-300">
                    <div class="p-4 text-center">
                        <h4 class="text-lg font-medium text-gray-900">{{ __("POST") }}</h4>
                        <p class="text-gray-600 mt-2 text-sm">
                            {{ __("make a post.") }}
                        </p>
                        <a href="{{route('posts.postform')}}" class="inline-block mt-4 text-blue-600 text-sm font-medium hover:text-blue-800 transition duration-200">
                            {{ __("see post form →") }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
