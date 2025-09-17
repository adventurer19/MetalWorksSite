@extends('layouts.app')

@section('title', __('nav.capabilities') . ' - ' . __('site.company_name'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">{{ __('nav.capabilities') }}</h1>
@endsection

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Production Capabilities</h2>
                <p class="mt-4 text-lg text-gray-600">State-of-the-art equipment and facilities</p>
            </div>

            <!-- Facility Overview -->
            <div class="bg-gray-50 rounded-lg p-8 mb-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600">45,000</div>
                        <div class="text-gray-600">Square meters facility</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600">300+</div>
                        <div class="text-gray-600">Skilled employees</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600">24/7</div>
                        <div class="text-gray-600">Production capacity</div>
                    </div>
                </div>
            </div>

            <!-- Equipment Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach($capabilities as $capability)
                    <div class="bg-white border border-gray-200 rounded-lg p-6">
                        <div class="bg-gray-200 h-48 rounded-lg mb-4 flex items-center justify-center">
                            <span class="text-gray-500">Equipment Image</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $capability['name'] }}</h3>
                        <p class="text-gray-600 mb-2">{{ $capability['description'] }}</p>
                        <div class="text-sm text-blue-600 font-medium">{{ $capability['capacity'] }}</div>
                    </div>
                @endforeach
            </div>

            <!-- Quality Assurance -->
            <div class="mt-16 bg-gray-900 text-white rounded-lg p-8">
                <h3 class="text-2xl font-bold mb-6">Quality Assurance</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h4 class="font-semibold mb-2">ISO Certified</h4>
                        <p class="text-gray-300">ISO 9001:2015, ISO 14001:2015, ISO 45001:2018</p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-2">Testing Equipment</h4>
                        <p class="text-gray-300">Advanced testing and measurement equipment</p>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-2">Quality Control</h4>
                        <p class="text-gray-300">Comprehensive quality control at every stage</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
