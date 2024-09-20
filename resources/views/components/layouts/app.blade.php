<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bible Quiz' }}</title>
    <meta name="keywords" content="{{ $keywords ?? 'Quiz, Bible, Games' }}">
    <meta name="description" content="{{ $description ?? 'Free downloadable bible quizzes and bible scavengers' }}">
    <meta name="author" content="{{ $author ?? 'Virgil Rosalita' }}">
    <meta name="application-name" content="{{ $application_name ?? 'Bible Prudence' }}">
    <meta name="generator" content="{{ $generator ?? 'Laravel Livewire 3.0' }}">
    <meta name="robots" content="{{ $robots ?? 'index, follow' }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">
    @vite('resources/css/app.css')    
</head>

<body class="text-zinc-100 text-md bg-green-50">
    <div class="mx-auto">
        @include('components.parts.header')
        <x-email></x-email>
        <x-correct></x-correct>
        <x-wrong></x-wrong>
        <x-success></x-success>
        {{ $slot }}
        @include('components.parts.footer')
    </div>
</body>

</html>