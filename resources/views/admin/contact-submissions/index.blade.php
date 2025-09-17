@extends('layouts.admin')

@section('title', 'Contact Submissions')

@section('content')
    <div class="space-y-6">
        <!-- Page Header -->
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Contact Submissions
                </h2>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <!-- Search Form -->
                <form method="GET" action="{{ route('admin.contact-submissions.index') }}" class="flex-1">
                    @if(request('status'))
                        <input type="hidden" name="status" value="{{ request('status') }}">
                    @endif
                    <div class="flex">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search by name, email, subject..."
                               class="flex-1 border-gray-300 rounded-l-md focus:ring-blue-500 focus:border-blue-500">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-r-md hover:bg-blue-700">
                            Search
                        </button>
                    </div>
                </form>

                <!-- Status Filter -->
                <div class="flex gap-2">
                    <a href="{{ route('admin.contact-submissions.index') }}"
                       class="px-4 py-2 rounded-md text-sm font-medium {{ !request('status') ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:text-gray-900' }}">
                        All
                    </a>
                    <a href="{{ route('admin.contact-submissions.index', ['status' => 'unread']) }}"
                       class="px-4 py-2 rounded-md text-sm font-medium {{ request('status') === 'unread' ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:text-gray-900' }}">
                        Unread
                    </a>
                    <a href="{{ route('admin.contact-submissions.index', ['status' => 'read']) }}"
                       class="px-4 py-2 rounded-md text-sm font-medium {{ request('status') === 'read' ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:text-gray-900' }}">
                        Read
                    </a>
                    <a href="{{ route('admin.contact-submissions.index', ['status' => 'replied']) }}"
                       class="px-4 py-2 rounded-md text-sm font-medium {{ request('status') === 'replied' ? 'bg-blue-100 text-blue-700' : 'text-gray-700 hover:text-gray-900' }}">
                        Replied
                    </a>
                </div>
            </div>
        </div>

        <!-- Submissions Table -->
        <div class="bg-white shadow rounded-lg">
            @if($submissions->count() > 0)
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Contact
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Subject
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($submissions as $submission)
                            <tr class="{{ $submission->is_read ? '' : 'bg-blue-50' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                            <span class="text-sm font-medium text-gray-700">
                                                {{ strtoupper(substr($submission->name, 0, 2)) }}
                                            </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $submission->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $submission->email }}
                                            </div>
                                            @if($submission->company)
                                                <div class="text-xs text-gray-400">
                                                    {{ $submission->company }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ Str::limit($submission->subject, 50) }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ Str::limit($submission->message, 80) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $submission->created_at->format('M j, Y') }}
                                    <br>
                                    <span class="text-xs">{{ $submission->created_at->format('H:i') }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col space-y-1">
                                        @if(!$submission->is_read)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            Unread
                                        </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            Read
                                        </span>
                                        @endif

                                        @if($submission->is_replied)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            Replied
                                        </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-y-2">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.contact-submissions.show', $submission) }}"
                                           class="text-blue-600 hover:text-blue-900">
                                            View
                                        </a>
                                        @if(!$submission->is_read)
                                            <form method="POST" action="{{ route('admin.contact-submissions.mark-read', $submission) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-green-600 hover:text-green-900">
                                                    Mark Read
                                                </button>
                                            </form>
                                        @endif
                                        @if(!$submission->is_replied)
                                            <form method="POST" action="{{ route('admin.contact-submissions.mark-replied', $submission) }}" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-yellow-600 hover:text-yellow-900">
                                                    Mark Replied
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <div>
                                        <form method="POST" action="{{ route('admin.contact-submissions.destroy', $submission) }}" class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this submission?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200">
                    {{ $submissions->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No submissions found</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        @if(request('search') || request('status'))
                            Try adjusting your search or filter criteria.
                        @else
                            Contact form submissions will appear here when received.
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
