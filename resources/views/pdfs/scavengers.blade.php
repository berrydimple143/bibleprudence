<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bible Scavenger PDF</title>
    <style>
        * {
            margin: 2px;
            padding: 1px;
        }

        body {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <div>
        @if($scavengers->count())
        <h4>Bible Scavengers</h4>
        @foreach ($scavengers as $scavenger)
        <p>
            {{ $loop->index + 1 }}.) {{ $scavenger->question }} in {{ $scavenger->verse }}? Answer: {{ $scavenger->answer }}
        </p>
        @endforeach
        @endif
    </div>
</body>

</html>
