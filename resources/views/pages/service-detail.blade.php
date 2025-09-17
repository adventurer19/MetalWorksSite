@extends('layouts.app')

@section('title', $service['name'] . ' - ' . __('nav.services') . ' - ' . __('site.company_name'))

@section('header')
    <div class="flex items-center">
        <a href="{{ route('services', app()->getLocale()) }}" class="text-blue-600 hover:text-blue-800 mr-4">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-3xl font-bold text-gray-900">{{ $service['name'] }}</h1>
    </div>
@endsection

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <div class="bg-gray-200 h-64 rounded-lg mb-6 flex items-center justify-center">
                        <span class="text-gray-500">Service Image</span>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $service['name'] }}</h2>
                    <p class="text-lg text-gray-600 mb-6">{{ $service['full_description'] ?? $service['description'] }}</p>

                    @if(isset($service['specifications']))
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Technical Specifications</h3>
                            <dl class="grid grid-cols-1 gap-4">
                                @foreach($service['specifications'] as $key => $value)
                                    <div>
                                        <dt class="font-medium text-gray-900">{{ $key }}</dt>
                                        <dd class="text-gray-600">{{ $value }}</dd>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                    @endif

                    <div class="mt-8">
                        <a href="{{ route('contact', app()->getLocale()) }}"
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700">
                            {{ __('site.contact_us') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
