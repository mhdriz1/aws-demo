<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="w-5/6">
                <!-- Page Heading -->
                <header class="bg-white shadow">
                    <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center sm:justify-between sm:gap-4">
                            <div
                                class="flex items-center justify-between flex-1 gap-8 sm:justify-end"
                            >
                                <!-- Settings Dropdown -->
                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button
                                                type="button"
                                                class="flex items-center transition rounded-lg group shrink-0"
                                            >
                                                <img
                                                    class="object-cover w-10 h-10 rounded-full"
                                                    src="https://www.hyperui.dev/photos/man-4.jpeg"
                                                    alt="Simon Lewis"
                                                />

                                                <p class="hidden ml-2 text-xs text-left sm:block">
                                                    <strong class="block font-medium">{{ Auth::user()->name }}</strong>

                                                    <span class="text-gray-500">{{ Auth::user()->email }}</span>
                                                </p>

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="hidden w-5 h-5 ml-4 text-gray-500 transition sm:block group-hover:text-gray-700"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
