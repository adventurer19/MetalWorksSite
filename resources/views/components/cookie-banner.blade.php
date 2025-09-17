@if(!request()->cookie('cookie_consent'))
    <div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 shadow-lg z-50">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0">
                <div class="flex-1">
                    <p class="text-sm">
                        <strong>{{ __('cookies.banner_title') }}</strong><br>
                        {{ __('cookies.banner_description') }}
                        <a href="#" class="underline hover:no-underline">{{ __('cookies.privacy_policy') }}</a>
                        {{ __('cookies.and') }}
                        <a href="#" class="underline hover:no-underline">{{ __('cookies.cookie_policy') }}</a>.
                    </p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="acceptCookies()"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium">
                        {{ __('cookies.accept_all') }}
                    </button>
                    <button onclick="rejectCookies()"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium">
                        {{ __('cookies.reject_all') }}
                    </button>
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
            }).catch(error => {
                console.log('Error:', error);
                // Hide banner anyway for testing
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
            }).catch(error => {
                console.log('Error:', error);
                // Hide banner anyway for testing
                document.getElementById('cookie-banner').style.display = 'none';
            });
        }
    </script>
@endif
