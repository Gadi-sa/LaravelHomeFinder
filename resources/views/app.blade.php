<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/js/app.js') {{-- used to load the js file --}}
        @inertiaHead {{-- used to load the inertia head which is used to load the css file --}}
    </head>
    <body >
        @inertia
    </body>
</html>
