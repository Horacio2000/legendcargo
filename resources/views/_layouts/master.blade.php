<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.jpg') }}" />

        <meta name="description" content="Tableau de bord | Legend Cargo">

        <title>Tableau de bord | Legend Cargo</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

       <!-- Scripts -->
       @vite(['resources/css/app.css', 'resources/js/app.js'])
       <style>
        .mark {
            color: red;
        }
       </style>
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('_layouts.sidebar')

            <div class="flex-1 flex flex-col overflow-hidden">
                @include('_layouts.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        @yield('body')
                    </div>
                </main>
            </div>
        </div>
        @yield('script')
    </body>
</html>
