<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Church Financial System' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">    
    @vite('resources/css/app.css')    
</head>

<body class="bg-gray-100 font-family-karla flex antialiased">
    @include('components.parts.accounting.sidebar')
    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        @include('components.parts.accounting.header')
        <x-check-record></x-check-record>
        <div class="w-full overflow-x-hidden border-t flex flex-col">
            {{ $slot }}
        </div>
    </div>    

    @livewireChartsScripts
</body>

</html>
