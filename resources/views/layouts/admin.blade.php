<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<div class="min-h-screen">
    <!-- Navigation -->
    <nav class="bg-blue-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-white text-lg font-semibold">
                        Metalik Admin
                    </a>
                    <div class="hidden md:flex md:ml-10 space-x-8">
                        <a href="{{ route('admin.dashboard') }}"
                           class="text-blue-100 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ Request::routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.contact-submissions.index') }}"
                           class="text-blue-100 hover:text-white px-3 py-2 rounded-md text-sm font-medium {{ Request::routeIs('admin.contact-submissions.*') ? 'bg-blue-700' : '' }}">
                            Contact Submissions
                        </a>
                    </div>
                </div>
                <!-- UPDATED NAVIGATION RIGHT SIDE -->
                <div class="flex items-center space-x-4">
                    @auth('admin')
                        <span class="text-blue-100 text-sm">{{ Auth::guard('admin')->user()->name }}</span>
                        <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-100 hover:text-white">Logout</button>
                        </form>
                    @endauth
                    <a href="{{ route('home', 'bg') }}" class="text-blue-100 hover:text-white">
                        View Site
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
