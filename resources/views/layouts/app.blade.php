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
        @livewireStyles
        <link rel="stylesheet" href="{{mix('css/app.css')}}">


        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased">
        {{-- <x-jet-banner /> --}}

        <div class="h-screen bg-gray-100 dark:bg-gray-900">
            @livewire('navigation-menu')

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl bg-black mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            {{-- @if ($errors->any())
            <div class="px-4 py-3 bg-red-200 text-red-500 m-auto w-1/2 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}


            <!-- Page Content -->
        @if (isset($data))
        <main class="w-full h-[90%]">
             <div class="grid grid-cols-6 h-full">
                <x-side :page='$page' />
                <x-main :page='$page' :data='$data'/>
            </div>
        </main>
        @else
        {{ $slot }}
         @endif

        </div>


        @stack('modals')

        @livewireScripts
        <script src="{{mix('js/app.js')}}"></script>

        <script src="{{mix('js/star.js')}}"></script>
    </body>
</html>
