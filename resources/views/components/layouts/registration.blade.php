<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Bible Prudence Registration Form' }}</title>
        <meta name="keywords" content="{{ $keywords ?? 'Quiz, Bible, Games' }}">
        <meta name="description" content="{{ $description ?? 'Free downloadable bible quizzes and bible scavengers' }}">
        <meta name="author" content="{{ $author ?? 'Virgil Rosalita' }}">
        <meta name="application-name" content="{{ $application_name ?? 'Bible Prudence' }}">
        <meta name="generator" content="{{ $generator ?? 'Laravel Livewire 3.0' }}">
        <meta name="robots" content="{{ $robots ?? 'index, follow' }}">    
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">
        <script src="https://cdn.tailwindcss.com"></script>    
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>

    <body>    
        {{ $slot }}
    </body>
</html>
