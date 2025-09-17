@extends('layouts.admin')

@section('title', 'Contact Submission - ' . $contactSubmission->subject)

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <div>
                                <a href="{{ route('admin.contact-submissions.index') }}" class="text-gray-400 hover:text-gray-500">
                                    Contact Submissions
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-4 text-sm font-medium text-gray-500">
                                {{ Str::limit($contactSubmission->subject, 50) }}
                            </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="mt-4 flex md:mt-0 md:ml-4 space-x-3">
                @if(!$contactSubmission->is_read)
                    <form method="POST" action="{{ route('admin.contact-submissions.mark-read', $contactSubmission) }}" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            Mark as Read
                        </button>
                    </form>
                @endif
                @if(!$contactSubmission->is_replied)
                    <form method="POST" action="{{ route('admin.contact-submissions.mark-replied', $contactSubmission) }}" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            Mark as Replied
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Message Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Subject and Message -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium text-gray-900">
                                {{ $contactSubmission->subject }}
                            </h3>
                            <div class="flex space-x-2">
                                @if(!$contactSubmission->is_read)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Unread
                                </span>
                                @endif
                                @if($contactSubmission->is_replied)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Replied
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="px-6 py-4">
                        <div class="prose max-w-none">
                            <p class="whitespace-pre-wrap text-gray-900">{{ $contactSubmission->message }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="space-y-6">
                <!-- Contact Details -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Contact Information</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $contactSubmission->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <a href="mailto:{{ $contactSubmission->email }}" class="text-blue-600 hover:text-blue-500">
                                    {{ $contactSubmission->email }}
                                </a>
                            </dd>
                        </div>
                        @if($contactSubmission->phone)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Phone</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <a href="tel:{{ $contactSubmission->phone }}" class="text-blue-600 hover:text-blue-500">
                                        {{ $contactSubmission->phone }}
                                    </a>
                                </dd>
                            </div>
                        @endif
                        @if($contactSubmission->company)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Company</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $contactSubmission->company }}</dd>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Submission Details -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Submission Details</h3>
                    </div>
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Date Submitted</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $contactSubmission->created_at->format('F j, Y \a\t g:i A') }}
                                <span class="text-gray-500">({{ $contactSubmission->created_at->diffForHumans() }})</span>
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Language</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $contactSubmission->locale === 'bg' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                {{ strtoupper($contactSubmission->locale) }}
                            </span>
                            </dd>
                        </div>
                        @if($contactSubmission->ip_address)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">IP Address</dt>
                                <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $contactSubmission->ip_address }}</dd>
                            </div>
                        @endif
                        @if($contactSubmission->user_agent)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Browser</dt>
                                <dd class="mt-1 text-xs text-gray-900 break-all">{{ Str::limit($contactSubmission->user_agent, 100) }}</dd>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="bg-white shadow rounded-lg">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Actions</h3>
                    </div>
                    <div class="px-6 py-4 space-y-3">
                        <!-- Reply via Email -->
                        <a href="mailto:{{ $contactSubmission->email }}?subject=Re: {{ $contactSubmission->subject }}&body=Hello {{ $contactSubmission->name }},%0D%0A%0D%0AThank you for contacting Metalik AD.%0D%0A%0D%0A"
                           class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Reply via Email
                        </a>

                        @if($contactSubmission->phone)
                            <!-- Call -->
                            <a href="tel:{{ $contactSubmission->phone }}"
                               class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Call {{ $contactSubmission->phone }}
                            </a>
                        @endif

                        <!-- Status Actions -->
                        <div class="border-t pt-3">
                            @if(!$contactSubmission->is_read)
                                <form method="POST" action="{{ route('admin.contact-submissions.mark-read', $contactSubmission) }}" class="mb-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Mark as Read
                                    </button>
                                </form>
                            @endif

                            @if(!$contactSubmission->is_replied)
                                <form method="POST" action="{{ route('admin.contact-submissions.mark-replied', $contactSubmission) }}" class="mb-2">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        Mark as Replied
                                    </button>
                                </form>
                            @endif

                            <!-- Delete -->
                            <form method="POST" action="{{ route('admin.contact-submissions.destroy', $contactSubmission) }}"
                                  onsubmit="return confirm('Are you sure you want to delete this submission? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50">
                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete Submission
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex justify-between">
            <a href="{{ route('admin.contact-submissions.index') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to List
            </a>
        </div>
    </div>
@endsection
