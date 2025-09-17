@extends('layouts.app')

@section('title', __('nav.home') . ' - ' . __('site.company_name'))
@section('description', __('site.tagline'))

@section('content')
    <div class="bg-white">
        <!-- Hero Section -->
        <div class="relative bg-gray-900">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
                    {{ __('site.company_name') }}
                </h1>
                <p class="mt-6 text-xl text-gray-300 max-w-3xl">
                    {{ __('site.tagline') }}
                </p>
                <div class="mt-10">
                    <a href="{{ route('about', app()->getLocale()) }}"
                       class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        {{ __('site.see_more') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-8 sm:grid-cols-3">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600">300+</div>
                        <div class="mt-2 text-lg text-gray-600">{{ __('site.employees') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600">45,000</div>
                        <div class="mt-2 text-lg text-gray-600">{{ __('site.facility_size') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600">25+</div>
                        <div class="mt-2 text-lg text-gray-600">{{ __('site.years_experience') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Preview -->
        <div class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-gray-900">{{ __('nav.services') }}</h2>
                    <p class="mt-4 text-lg text-gray-600">Our comprehensive industrial solutions</p>
                </div>
                <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900">Laser Cutting</h3>
                        <p class="mt-2 text-gray-600">High precision cutting services</p>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900">Welding</h3>
                        <p class="mt-2 text-gray-600">Professional welding solutions</p>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900">Processing</h3>
                        <p class="mt-2 text-gray-600">Mechanical processing services</p>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-900">Quality Control</h3>
                        <p class="mt-2 text-gray-600">Comprehensive quality assurance</p>
                    </div>
                </div>
                <div class="text-center mt-10">
                    <a href="{{ route('services', app()->getLocale()) }}"
                       class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        {{ __('site.see_more') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
