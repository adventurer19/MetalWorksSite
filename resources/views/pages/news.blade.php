@extends('layouts.app')

@section('title', __('nav.news') . ' - ' . __('site.company_name'))

@section('header')
    <h1 class="text-3xl font-bold text-gray-900">{{ __('nav.news') }}</h1>
@endsection

@section('content')
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Latest News</h2>
                <p class="mt-4 text-lg text-gray-600">Stay updated with our latest developments and achievements</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Article -->
                @if($news->isNotEmpty())
                    <div class="lg:col-span-2">
                        @php $featured = $news->first(); @endphp
                        <article class="bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div class="bg-gray-200 h-64 rounded-t-lg flex items-center justify-center">
                                <span class="text-gray-500">Featured Article Image</span>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $featured['category'] }}
                            </span>
                                    <span class="text-sm text-gray-500">{{ $featured['published_at'] }}</span>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $featured['title'] }}</h2>
                                <p class="text-gray-600 mb-4">{{ $featured['excerpt'] }}</p>
                                <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                    {{ __('site.read_more') }}
                                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>

                    <!-- Sidebar Articles -->
                    <div class="space-y-6">
                        @foreach($news->skip(1) as $article)
                            <article class="bg-white border border-gray-200 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $article['category'] }}
                        </span>
                                    <span class="text-xs text-gray-500">{{ $article['published_at'] }}</span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $article['title'] }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ $article['excerpt'] }}</p>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                    {{ __('site.read_more') }}
                                </a>
                            </article>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- All Articles List -->
            <div class="mt-16">
                <h3 class="text-2xl font-bold text-gray-900 mb-8">All News</h3>
                <div class="space-y-6">
                    @foreach($news as $article)
                        <article class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                <div class="flex items-center space-x-4 mb-2 md:mb-0">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $article['category'] }}
                            </span>
                                    <span class="text-sm text-gray-500">{{ $article['published_at'] }}</span>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $article['title'] }}</h3>
                            <p class="text-gray-600 mb-4">{{ $article['excerpt'] }}</p>
                            <a href="#" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                {{ __('site.read_more') }}
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
