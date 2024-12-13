<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Generador de CV</title>

       
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-white dark:text-black/50">
        <div class="bg-white text-black/50 dark:bg-white dark:text-black/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#D1E7DC] selection:text-black">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <img src="{{ asset('images/pngwing.com.png') }}" alt="Logo" class="w-16 h-16" />
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-[#1F4A46] ring-1 ring-transparent transition hover:text-[#2C7D7F]/70 focus:outline-none focus-visible:ring-[#A7C7B8] dark:text-[#1F4A46] dark:hover:text-[#2C7D7F]/80 dark:focus-visible:ring-black"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-[#1F4A46] ring-1 ring-transparent transition hover:text-[#2C7D7F]/70 focus:outline-none focus-visible:ring-[#A7C7B8] dark:text-[#1F4A46] dark:hover:text-[#2C7D7F]/80 dark:focus-visible:ring-black"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-[#1F4A46] ring-1 ring-transparent transition hover:text-[#2C7D7F]/70 focus:outline-none focus-visible:ring-[#A7C7B8] dark:text-[#1F4A46] dark:hover:text-[#2C7D7F]/80 dark:focus-visible:ring-black"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main class="mt-6">
                       
                       <div class="text-center">
                           <h2 class="text-2xl font-semibold text-[#1F4A46] mb-4">
                               Generador de Currículums Profesionales
                           </h2>
                           <p class="text-lg text-[#2C7D7F] max-w-2xl mx-auto">
                               Esta aplicación te permite crear tu currículum de forma fácil y rápida, ayudándote a destacar en el mundo laboral. Personaliza tu CV con tus datos y exportalo a PDF para compartirlo con potenciales empleadores.
                           </p>
                       </div>
                    </main>

                    <body class="font-sans antialiased dark:bg-white dark:text-black/50">
                        <div class="bg-white text-black/50 dark:bg-white dark:text-black/50">
                            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#D1E7DC] selection:text-black">
                                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                                        <div class="flex lg:justify-center lg:col-start-2">
                                            <svg class="h-12 w-auto text-[#1F4A46] lg:h-16 lg:text-[#2C7D7F]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 ..."></path></svg>
                                        </div>
                                    </header>
                                  
                                    <main>
                                        <p class="text-center text-xl text-[#1F4A46]">Explora las funcionalidades y disfruta de la experiencia.</p>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </body>
                    <footer class="py-16 text-center text-sm text-[#1F4A46] dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
