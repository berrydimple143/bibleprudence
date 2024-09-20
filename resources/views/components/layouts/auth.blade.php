<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bible Quiz' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">
    @vite('resources/css/app.css')
</head>

<body class="text-zinc-100 text-md">
    <div class="mx-auto">
    	<x-error></x-error>
        {{ $slot }}
    </div>
</body>

</html>