@php
    use App\Http\Controllers\CookieController;
    $hasConsent = CookieController::hasConsent(request());
@endphp

@if(!$hasConsent)
    <div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 shadow-lg z-50 transform translate-y-0 transition-transform duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0">
                <div class="flex-1 pr-4">
                    <p class="text-sm leading-relaxed">
                        <strong class="text-base">{{ __('cookies.banner_title') }}</strong><br>
                        {{ __('cookies.banner_description') }}
                        <a href="{{ route('privacy-policy', app()->getLocale()) }}"
                           class="underline hover:no-underline text-blue-300"
                           target="_blank">
                            {{ __('cookies.privacy_policy') }}
                        </a>
                        {{ __('cookies.and') }}
                        <a href="{{ route('cookie-policy', app()->getLocale()) }}"
                           class="underline hover:no-underline text-blue-300"
                           target="_blank">
                            {{ __('cookies.cookie_policy') }}
                        </a>.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 shrink-0">
                    <button onclick="showCookieSettings()"
                            class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm font-medium transition-colors duration-200">
                        {{ __('cookies.settings') }}
                    </button>
                    <button onclick="rejectCookies()"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors duration-200">
                        {{ __('cookies.reject_all') }}
                    </button>
                    <button onclick="acceptCookies()"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors duration-200">
                        {{ __('cookies.accept_all') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cookie Settings Modal -->
    <div id="cookie-settings-modal" class="fixed inset-0 bg-black bg-opacity-50 z-[60] hidden items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-lg w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold text-gray-900">{{ __('cookies.settings_title') }}</h3>
                    <button onclick="closeCookieSettings()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="space-y-6">
                    <!-- Necessary Cookies -->
                    <div class="flex items-start justify-between">
                        <div class="flex-1 mr-4">
                            <h4 class="font-medium text-gray-900 mb-1">{{ __('cookies.necessary') }}</h4>
                            <p class="text-sm text-gray-600">{{ __('cookies.necessary_desc') }}</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="necessary" checked disabled
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Analytics Cookies -->
                    <div class="flex items-start justify-between">
                        <div class="flex-1 mr-4">
                            <h4 class="font-medium text-gray-900 mb-1">{{ __('cookies.analytics') }}</h4>
                            <p class="text-sm text-gray-600">{{ __('cookies.analytics_desc') }}</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="analytics"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Marketing Cookies -->
                    <div class="flex items-start justify-between">
                        <div class="flex-1 mr-4">
                            <h4 class="font-medium text-gray-900 mb-1">{{ __('cookies.marketing') }}</h4>
                            <p class="text-sm text-gray-600">{{ __('cookies.marketing_desc') }}</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="marketing"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Preferences Cookies -->
                    <div class="flex items-start justify-between">
                        <div class="flex-1 mr-4">
                            <h4 class="font-medium text-gray-900 mb-1">{{ __('cookies.preferences') }}</h4>
                            <p class="text-sm text-gray-600">{{ __('cookies.preferences_desc') }}</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="preferences"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t border-gray-200">
                    <button onclick="closeCookieSettings()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        Cancel
                    </button>
                    <button onclick="saveCookieSettings()"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700">
                        {{ __('cookies.save_settings') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Debug logging
        console.log('Cookie banner script loaded');
        console.log('Current cookies:', document.cookie);

        function acceptCookies() {
            console.log('Accept cookies clicked');

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error('CSRF token not found');
                return;
            }

            fetch('/cookies/accept', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (response.ok) {
                        hideCookieBanner();
                        console.log('Cookies accepted successfully');
                    } else {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                })
                .catch(error => {
                    console.error('Error accepting cookies:', error);
                    // Hide banner anyway for better UX
                    hideCookieBanner();
                });
        }

        function rejectCookies() {
            console.log('Reject cookies clicked');

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error('CSRF token not found');
                return;
            }

            fetch('/cookies/reject', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                credentials: 'same-origin'
            })
                .then(response => {
                    console.log('Response status:', response.status);
                    if (response.ok) {
                        hideCookieBanner();
                        console.log('Cookies rejected successfully');
                    } else {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                })
                .catch(error => {
                    console.error('Error rejecting cookies:', error);
                    // Hide banner anyway for better UX
                    hideCookieBanner();
                });
        }

        function showCookieSettings() {
            const modal = document.getElementById('cookie-settings-modal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeCookieSettings() {
            const modal = document.getElementById('cookie-settings-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function saveCookieSettings() {
            const settings = {
                necessary: true, // Always true
                analytics: document.getElementById('analytics').checked,
                marketing: document.getElementById('marketing').checked,
                preferences: document.getElementById('preferences').checked
            };

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error('CSRF token not found');
                return;
            }

            fetch('/cookies/settings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                credentials: 'same-origin',
                body: JSON.stringify(settings)
            })
                .then(response => {
                    if (response.ok) {
                        closeCookieSettings();
                        hideCookieBanner();
                        console.log('Cookie settings saved');
                    } else {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                })
                .catch(error => {
                    console.error('Error saving cookie settings:', error);
                    // Close modal anyway for better UX
                    closeCookieSettings();
                    hideCookieBanner();
                });
        }

        function hideCookieBanner() {
            const banner = document.getElementById('cookie-banner');
            if (banner) {
                banner.style.transform = 'translateY(100%)';
                setTimeout(() => {
                    banner.style.display = 'none';
                }, 300);
            }
        }

        // Show banner after page load with animation
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, checking for cookie banner');
            const banner = document.getElementById('cookie-banner');
            if (banner) {
                console.log('Cookie banner found and should be visible');
                // Small delay for better UX
                setTimeout(() => {
                    banner.style.transform = 'translateY(0)';
                }, 500);
            } else {
                console.log('Cookie banner not found in DOM');
            }
        });
    </script>
@endif
