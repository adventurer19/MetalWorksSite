<footer class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ __('site.company_name') }}</h3>
                <p class="text-gray-300 mb-4">{{ __('site.tagline') }}</p>
                <div class="text-gray-300">
                    <p>300+ {{ __('site.employees') }}</p>
                    <p>45,000 {{ __('site.facility_size') }}</p>
                    <p>25+ {{ __('site.years_experience') }}</p>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ __('nav.services') }}</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-white transition-colors">Laser Cutting</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Welding</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Mechanical Processing</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Quality Control</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">{{ __('nav.contact') }}</h3>
                <div class="text-gray-300 space-y-2">
                    <p>1309 Sofia, Bulgaria</p>
                    <p>Phone: +359 2 XXX XXXX</p>
                    <p>Email: office@metalik.bg</p>
                </div>
            </div>
        </div>

        <!-- Legal Links -->
        <div class="mt-8 pt-8 border-t border-gray-700 text-center text-sm">
            <div class="flex flex-wrap justify-center gap-6 mb-4">
                <a href="{{ route('privacy-policy', app()->getLocale()) }}"
                   class="text-gray-400 hover:text-white transition-colors">
                    {{ __('Privacy Policy') }}
                </a>
                <a href="{{ route('cookie-policy', app()->getLocale()) }}"
                   class="text-gray-400 hover:text-white transition-colors">
                    {{ __('Cookie Policy') }}
                </a>
                <a href="{{ route('cookie-settings', app()->getLocale()) }}"
                   class="text-gray-400 hover:text-white transition-colors">
                    {{ __('Cookie Settings') }}
                </a>
                <a href="{{ route('terms-of-service', app()->getLocale()) }}"
                   class="text-gray-400 hover:text-white transition-colors">
                    {{ __('Terms of Service') }}
                </a>
            </div>
            <p class="text-gray-400">&copy; {{ date('Y') }} {{ __('site.company_name') }}. All rights reserved.</p>
        </div>
    </div>
</footer>
