<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HomeFinder</title>

        @routes
        @vite('resources/js/app.js') {{-- used to load the js file --}}
        @inertiaHead {{-- used to load the inertia head which is used to load the css file --}}
    </head>
    <body class="bg-white dark:bg-gray-200 text-gray-800 dark:text-gray-400">
        @inertia
    </body>
</html>
