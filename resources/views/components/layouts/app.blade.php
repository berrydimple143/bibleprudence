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
    @if($page == "quiz" || $page == "scavenger" || $page == "math" || $page == "blog" || $page == "post")
	   <meta name="google-adsense-account" content="ca-pub-5275045752917947">
    @endif
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @if($page == "quiz" || $page == "scavenger" || $page == "math" || $page == "blog" || $page == "post")
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5275045752917947"
     crossorigin="anonymous"></script>
    @endif
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="text-zinc-100 text-md bg-green-50">
    @if($page == "quiz" || $page == "scavenger" || $page == "math" || $page == "blog" || $page == "post")
        <amp-auto-ads type="adsense"
            data-ad-client="ca-pub-7121193606171576">
        </amp-auto-ads>
    @endif
    <div class="mx-auto">
        @include('components.parts.header')
        <x-email></x-email>
        <x-correct></x-correct>
        <x-wrong></x-wrong>
        <x-result></x-result>
        <x-success></x-success>
        {{ $slot }}
        @include('components.parts.footer')
    </div>
</body>

</html>
