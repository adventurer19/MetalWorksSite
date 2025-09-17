@extends('layouts.app')

@section('title', __('cookies.settings_title') . ' - ' . __('site.company_name'))

@section('content')
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm rounded-lg">
            <div class="px-6 py-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-8">{{ __('cookies.settings_title') }}</h1>

                <!-- Current Status -->
                @php
                    use App\Http\Controllers\CookieController;
                    $preferences = CookieController::getPreferences(request());
                @endphp

                <div class="mb-8 p-4 bg-blue-50 border-l-4 border-blue-400">
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-sm text-blue-700">
                                <strong>Current Status:</strong>
                                @if($preferences['consent'] === 'accepted')
                                    All cookies accepted
                                @elseif($preferences['consent'] === 'rejected')
                                    Only necessary cookies
                                @elseif($preferences['consent'] === 'custom')
                                    Custom preferences set
                                @else
                                    No preferences set yet
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

                <form id="cookie-preferences-form" class="space-y-8">
                    @csrf

                    <!-- Necessary Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">
                                    {{ __('cookies.necessary') }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    {{ __('cookies.necessary_desc') }}
                                </p>
                                <div class="text-xs text-gray-500">
                                    <strong>Examples:</strong> Session cookies, CSRF protection, language preferences
                                </div>
                            </div>
                            <div class="flex items-center ml-6">
                                <input type="checkbox"
                                       id="necessary"
                                       name="necessary"
                                       checked
                                       disabled
                                       class="h-5 w-5 text-blue-600 rounded border-gray-300 bg-gray-100">
                                <label for="necessary" class="ml-2 text-sm text-gray-500">Required</label>
                            </div>
                        </div>
                    </div>

                    <!-- Analytics Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">
                                    {{ __('cookies.analytics') }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    {{ __('cookies.analytics_desc') }}
                                </p>
                                <div class="text-xs text-gray-500">
                                    <strong>Examples:</strong> Google Analytics, page view tracking, user behavior analysis
                                </div>
                            </div>
                            <div class="flex items-center ml-6">
                                <input type="checkbox"
                                       id="analytics"
                                       name="analytics"
                                       value="1"
                                       {{ $preferences['analytics'] ? 'checked' : '' }}
                                       class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <label for="analytics" class="ml-2 text-sm text-gray-700">Enable</label>
                            </div>
                        </div>
                    </div>

                    <!-- Marketing Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">
                                    {{ __('cookies.marketing') }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    {{ __('cookies.marketing_desc') }}
                                </p>
                                <div class="text-xs text-gray-500">
                                    <strong>Examples:</strong> Advertisement targeting, social media pixels, remarketing
                                </div>
                            </div>
                            <div class="flex items-center ml-6">
                                <input type="checkbox"
                                       id="marketing"
                                       name="marketing"
                                       value="1"
                                       {{ $preferences['marketing'] ? 'checked' : '' }}
                                       class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <label for="marketing" class="ml-2 text-sm text-gray-700">Enable</label>
                            </div>
                        </div>
                    </div>

                    <!-- Preferences Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="text-lg font-medium text-gray-900 mb-2">
                                    {{ __('cookies.preferences') }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    {{ __('cookies.preferences_desc') }}
                                </p>
                                <div class="text-xs text-gray-500">
                                    <strong>Examples:</strong> Theme preferences, display settings, personalization
                                </div>
                            </div>
                            <div class="flex items-center ml-6">
                                <input type="checkbox"
                                       id="preferences"
                                       name="preferences"
                                       value="1"
                                       {{ $preferences['preferences'] ? 'checked' : '' }}
                                       class="h-5 w-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <label for="preferences" class="ml-2 text-sm text-gray-700">Enable</label>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6 border-t border-gray-200">
                        <button type="submit"
                                class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200">
                            {{ __('cookies.save_settings') }}
                        </button>

                        <button type="button"
                                onclick="acceptAll()"
                                class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200">
                            {{ __('cookies.accept_all') }}
                        </button>

                        <button type="button"
                                onclick="rejectAll()"
                                class="flex-1 bg-red-600 hover:bg-red-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200">
                            {{ __('cookies.reject_all') }}
                        </button>
                    </div>
                </form>

                <!-- Status Message -->
                <div id="status-message" class="mt-6 hidden">
                    <div class="p-4 rounded-lg">
                        <p id="status-text"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('cookie-preferences-form').addEventListener('submit', function(e) {
            e.preventDefault();
            saveCustomSettings();
        });

        function saveCustomSettings() {
            const form = document.getElementById('cookie-preferences-form');
            const formData = new FormData(form);

            const settings = {
                necessary: true, // Always true
                analytics: formData.has('analytics'),
                marketing: formData.has('marketing'),
                preferences: formData.has('preferences')
            };

            sendCookieRequest('/cookies/settings', settings, 'Custom preferences saved successfully!');
        }

        function acceptAll() {
            // Check all checkboxes
            document.getElementById('analytics').checked = true;
            document.getElementById('marketing').checked = true;
            document.getElementById('preferences').checked = true;

            sendCookieRequest('/cookies/accept', {}, 'All cookies accepted successfully!');
        }

        function rejectAll() {
            // Uncheck all optional checkboxes
            document.getElementById('analytics').checked = false;
            document.getElementById('marketing').checked = false;
            document.getElementById('preferences').checked = false;

            sendCookieRequest('/cookies/reject', {}, 'Optional cookies rejected successfully!');
        }

        function sendCookieRequest(url, data, successMessage) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');

            if (!csrfToken) {
                showStatus('CSRF token not found!', 'error');
                return;
            }

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                credentials: 'same-origin',
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (response.ok) {
                        showStatus(successMessage, 'success');
                        // Optionally redirect back to the page they came from
                        setTimeout(() => {
                            const referrer = document.referrer;
                            if (referrer && referrer !== window.location.href) {
                                window.location.href = referrer;
                            }
                        }, 2000);
                    } else {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showStatus('An error occurred while saving preferences.', 'error');
                });
        }

        function showStatus(message, type) {
            const statusDiv = document.getElementById('status-message');
            const statusText = document.getElementById('status-text');

            statusText.textContent = message;
            statusDiv.className = 'mt-6 ' + (type === 'success' ? 'text-green-700 bg-green-100 border-green-300' : 'text-red-700 bg-red-100 border-red-300') + ' p-4 rounded-lg border';
            statusDiv.classList.remove('hidden');

            // Hide after 5 seconds
            setTimeout(() => {
                statusDiv.classList.add('hidden');
            }, 5000);
        }
    </script>
@endsection
