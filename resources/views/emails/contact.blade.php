<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bible Prudence</title>        
    </head>
    <body class="text-zinc-100 text-md">
        <h1>Name:</h1>
        <p>{{ $contact->name }}</p>

        <h1>Email:</h1>
        <p>{{ $contact->email }}</p>

        <h1>Message:</h1>
        <p>{{ $contact->message }}</p>
    </body>    
</html>