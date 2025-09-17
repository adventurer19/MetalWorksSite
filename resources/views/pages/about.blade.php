@extends('layouts.app')

@section('title', __('nav.about') . ' - ' . __('site.company_name'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">{{ __('nav.about') }}</h1>
@endsection

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Company Introduction -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">{{ __('site.company_name') }}</h2>
                    <p class="text-lg text-gray-600 mb-4">
                        We are a leading Bulgarian company specializing in the production of equipment for industrial projects.
                        With over {{ $companyData['founded'] }} years of experience, we provide comprehensive solutions for
                        metallurgical and industrial applications.
                    </p>
                    <p class="text-lg text-gray-600 mb-6">
                        Our modern production facility spans {{ $companyData['facility_size'] }} square meters and employs
                        {{ $companyData['employees'] }} skilled professionals dedicated to delivering excellence.
                    </p>
                    <a href="{{ route('contact', app()->getLocale()) }}"
                       class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                        {{ __('site.contact_us') }}
                    </a>
                </div>
                <div class="bg-gray-200 h-64 rounded-lg flex items-center justify-center">
                    <span class="text-gray-500">Company Image Placeholder</span>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="mt-16 bg-gray-50 rounded-lg p-8">
                <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">Company Overview</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">{{ $companyData['employees'] }}</div>
                        <div class="text-gray-600">{{ __('site.employees') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">{{ $companyData['facility_size'] }}</div>
                        <div class="text-gray-600">{{ __('site.facility_size') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">25+</div>
                        <div class="text-gray-600">{{ __('site.years_experience') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600">4</div>
                        <div class="text-gray-600">Export Markets</div>
                    </div>
                </div>
            </div>

            <!-- Certifications -->
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-8">Certifications & Quality</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($companyData['certifications'] as $cert)
                        <div class="bg-white border border-gray-200 rounded-lg p-6 text-center">
                            <div class="text-lg font-semibold text-gray-900">{{ $cert }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Markets -->
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-8">Export Markets</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($companyData['markets'] as $market)
                        <div class="text-center py-4 bg-gray-50 rounded-lg">
                            <span class="text-gray-700 font-medium">{{ $market }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
