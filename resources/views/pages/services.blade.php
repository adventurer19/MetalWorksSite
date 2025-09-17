@extends('layouts.app')

@section('title', __('nav.services') . ' - ' . __('site.company_name'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">{{ __('nav.services') }}</h1>
@endsection

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Our Services</h2>
                <p class="mt-4 text-lg text-gray-600">Comprehensive industrial solutions for your projects</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($services as $service)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow">
                        <div class="p-6">
                            <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                                <span class="text-gray-500">Service Image</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $service['name'] }}</h3>
                            <p class="text-gray-600 mb-4">{{ $service['description'] }}</p>
                            <a href="{{ route('services.show', [app()->getLocale(), $service['id'], $service['slug']]) }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                                {{ __('site.see_more') }}
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
