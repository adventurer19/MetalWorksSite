{{-- resources/views/components/hero.blade.php --}}
<section class="relative isolate overflow-hidden">
    {{-- soft background --}}
    <div class="absolute inset-0 bg-gradient-to-b from-slate-50 via-white to-white"></div>

    {{-- subtle pattern (SVG dots) --}}
    <svg class="absolute inset-0 opacity-40 pointer-events-none" aria-hidden="true">
        <defs>
            <pattern id="dots" width="24" height="24" patternUnits="userSpaceOnUse">
                <circle cx="1" cy="1" r="1" class="fill-slate-200"></circle>
            </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#dots)"></rect>
    </svg>

    {{-- decorative blobs (very subtle) --}}
    <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-blue-100 blur-3xl opacity-50"></div>
    <div class="absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-indigo-100 blur-3xl opacity-40"></div>

    <div class="relative container mx-auto px-6 py-20 lg:py-28">
        <div class="max-w-3xl">
            <h1 class="text-4xl/tight font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                СТАНЧЕВ И СИН 2025 ЕООД
            </h1>
            <p class="mt-4 text-lg text-slate-600">
                Оборудване за индустриални проекти
            </p>

            <div class="mt-8 flex items-center gap-4">
                <a href="{{ route('about', app()->getLocale()) }}"
                   class="inline-flex items-center rounded-xl px-5 py-3 font-medium shadow-sm
                  bg-blue-600 text-white hover:bg-blue-700 focus-visible:outline
                  focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Вижте повече
                </a>
                <a href="{{ route('contact', app()->getLocale()) }}"
                   class="inline-flex items-center rounded-xl px-5 py-3 font-medium
                  text-slate-700 ring-1 ring-slate-300 hover:bg-slate-50">
                    Контакти
                </a>
            </div>

            {{-- trust metrics --}}
            <dl class="mt-10 grid grid-cols-3 gap-6 max-w-lg">
                <div>
                    <dt class="text-sm text-slate-500">Проекти</dt>
                    <dd class="text-2xl font-semibold text-slate-900">300+</dd>
                </div>
                <div>
                    <dt class="text-sm text-slate-500">Часове</dt>
                    <dd class="text-2xl font-semibold text-slate-900">45,000</dd>
                </div>
                <div>
                    <dt class="text-sm text-slate-500">Години опит</dt>
                    <dd class="text-2xl font-semibold text-slate-900">25+</dd>
                </div>
            </dl>
        </div>
    </div>
</section>
