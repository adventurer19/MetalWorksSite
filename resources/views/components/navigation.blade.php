<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home', app()->getLocale()) }}" class="text-xl font-bold text-gray-800">
                        {{ __('site.company_name') }}
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('home', app()->getLocale()) }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::routeIs('home') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('nav.home') }}
                    </a>

                    <a href="{{ route('about', app()->getLocale()) }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::routeIs('about') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('nav.about') }}
                    </a>

                    <a href="{{ route('services', app()->getLocale()) }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::routeIs('services*') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('nav.services') }}
                    </a>

                    <a href="{{ route('capabilities', app()->getLocale()) }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::routeIs('capabilities') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('nav.capabilities') }}
                    </a>

                    <a href="{{ route('references', app()->getLocale()) }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::routeIs('references') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('nav.references') }}
                    </a>

                    <a href="{{ route('news', app()->getLocale()) }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::routeIs('news') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('nav.news') }}
                    </a>

                    <a href="{{ route('contact', app()->getLocale()) }}"
                       class="inline-flex items-center px-1 pt-1 text-sm font-medium {{ Request::routeIs('contact') ? 'border-b-2 border-blue-500 text-gray-900' : 'text-gray-500 hover:text-gray-700' }}">
                        {{ __('nav.contact') }}
                    </a>
                </div>
            </div>

            <!-- Language Switcher -->
            <div class="flex items-center space-x-4">
                <div class="flex space-x-2">
                    <a href="{{ request()->url() }}"
                       onclick="switchLanguage('bg')"
                       class="px-3 py-2 rounded-md text-sm font-medium {{ app()->getLocale() === 'bg' ? 'bg-blue-100 text-blue-700' : 'text-gray-500 hover:text-gray-700' }}">
                        БГ
                    </a>
                    <a href="{{ request()->url() }}"
                       onclick="switchLanguage('en')"
                       class="px-3 py-2 rounded-md text-sm font-medium {{ app()->getLocale() === 'en' ? 'bg-blue-100 text-blue-700' : 'text-gray-500 hover:text-gray-700' }}">
                        EN
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchLanguage(locale) {
            event.preventDefault();
            const currentPath = window.location.pathname;
            const pathParts = currentPath.split('/');

            // Replace the locale in the URL
            if (pathParts[1] === 'bg' || pathParts[1] === 'en') {
                pathParts[1] = locale;
            } else {
                pathParts.splice(1, 0, locale);
            }

            const newPath = pathParts.join('/');
            window.location.href = newPath;
        }
    </script>
</nav>
