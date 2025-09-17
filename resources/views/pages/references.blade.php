@extends('layouts.app')

@section('title', __('nav.references') . ' - ' . __('site.company_name'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">{{ __('nav.references') }}</h1>
@endsection

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Our Projects</h2>
                <p class="mt-4 text-lg text-gray-600">Successful projects delivered across various industries</p>
            </div>

            <!-- Project Stats -->
            <div class="bg-gray-50 rounded-lg p-8 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                    <div>
                        <div class="text-3xl font-bold text-blue-600">150+</div>
                        <div class="text-gray-600">Completed Projects</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-blue-600">25+</div>
                        <div class="text-gray-600">Countries</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-blue-600">100%</div>
                        <div class="text-gray-600">Success Rate</div>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-blue-600">24/7</div>
                        <div class="text-gray-600">Support</div>
                    </div>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($references as $reference)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-lg transition-shadow">
                        <div class="bg-gray-200 h-48 rounded-t-lg flex items-center justify-center">
                            <span class="text-gray-500">Project Image</span>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $reference['category'] }}
                        </span>
                                <span class="text-sm text-gray-500">{{ $reference['year'] }}</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $reference['title'] }}</h3>
                            <p class="text-gray-600 mb-3">{{ $reference['description'] }}</p>
                            <div class="text-sm text-gray-500 mb-2">
                                <strong>Client:</strong> {{ $reference['client'] }}
                            </div>
                            <div class="text-sm text-gray-500 mb-4">
                                <strong>Location:</strong> {{ $reference['location'] }}
                            </div>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                View Details
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-12">
                <div class="bg-blue-600 text-white rounded-lg p-8">
                    <h3 class="text-2xl font-bold mb-4">Ready to Start Your Project?</h3>
                    <p class="text-lg mb-6">Let us help you bring your industrial project to life</p>
                    <a href="{{ route('contact', app()->getLocale()) }}"
                       class="inline-flex items-center px-6 py-3 bg-white text-blue-600 font-medium rounded-md hover:bg-gray-100">
                        {{ __('site.contact_us') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
