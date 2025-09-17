@if(!request()->cookie('cookie_consent'))
    <div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 shadow-lg z-50">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                <div class="flex-1">
                    <p class="text-sm">
                        <strong>{{ __('cookies.banner_title') }}</strong><br>
                        {{ __('cookies.banner_description') }}
                        <a href="{{ route('privacy-policy', app()->getLocale()) }}" class="underline hover:no-underline">
                            {{ __('cookies.privacy_policy') }}
                        </a>
                        {{ __('cookies.and') }}
                        <a href="{{ route('cookie-policy', app()->getLocale()) }}" class="underline hover:no-underline">
                            {{ __('cookies.cookie_policy') }}
                        </a>.
                    </p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="acceptCookies()"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium">
                        {{ __('cookies.accept_all') }}
                    </button>
                    <button onclick="showCookieSettings()"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded text-sm font-medium">
                        {{ __('cookies.settings') }}
                    </button>
                    <button onclick="rejectCookies()"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium">
                        {{ __('cookies.reject_all') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cookie Settings Modal -->
    <div id="cookie-settings-modal" class="fixed inset-0 bg-black bg-opacity-50 z-60 hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-lg max-w-2xl w-full max-h-screen overflow-y-auto">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold">{{ __('cookies.settings_title') }}</h2>
                        <button onclick="closeCookieSettings()" class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <form id="cookie-preferences-form">
                        <div class="space-y-4">
                            <!-- Necessary Cookies -->
                            <div class="border-b pb-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold">{{ __('cookies.necessary') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('cookies.necessary_desc') }}</p>
                                    </div>
                                    <input type="checkbox" name="necessary" checked disabled class="w-4 h-4">
                                </div>
                            </div>

                            <!-- Analytics Cookies -->
                            <div class="border-b pb-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold">{{ __('cookies.analytics') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('cookies.analytics_desc') }}</p>
                                    </div>
                                    <input type="checkbox" name="analytics" class="w-4 h-4">
                                </div>
                            </div>

                            <!-- Marketing Cookies -->
                            <div class="border-b pb-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold">{{ __('cookies.marketing') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('cookies.marketing_desc') }}</p>
                                    </div>
                                    <input type="checkbox" name="marketing" class="w-4 h-4">
                                </div>
                            </div>

                            <!-- Preferences Cookies -->
                            <div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-semibold">{{ __('cookies.preferences') }}</h3>
                                        <p class="text-sm text-gray-600">{{ __('cookies.preferences_desc') }}</p>
                                    </div>
                                    <input type="checkbox" name="preferences" class="w-4 h-4">
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end space-x-3">
                            <button type="button" onclick="saveCookieSettings()"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">
                                {{ __('cookies.save_settings') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function acceptCookies() {
            fetch('/cookies/accept', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(() => {
                document.getElementById('cookie-banner').style.display = 'none';
            });
        }

        function rejectCookies() {
            fetch('/cookies/reject', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(() => {
                document.getElementById('cookie-banner').style.display = 'none';
            });
        }

        function showCookieSettings() {
            document.getElementById('cookie-settings-modal').classList.remove('hidden');
        }

        function closeCookieSettings() {
            document.getElementById('cookie-settings-modal').classList.add('hidden');
        }

        function saveCookieSettings() {
            const form = document.getElementById('cookie-preferences-form');
            const formData = new FormData(form);
            const preferences = {};

            for (let [key, value] of formData.entries()) {
                preferences[key] = true;
            }

            fetch('/cookies/settings', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(preferences)
            }).then(() => {
                document.getElementById('cookie-banner').style.display = 'none';
                document.getElementById('cookie-settings-modal').classList.add('hidden');
            });
        }
    </script>
@endif
