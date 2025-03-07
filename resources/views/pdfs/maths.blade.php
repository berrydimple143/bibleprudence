<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bible Math PDF</title>
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
        @if($maths->count())
            <h4>Bible Math - {{ ($level == '' || $level == null || empty($level)) ? 'All' : $level }}</h4>
            @foreach ($maths as $math)
            <p>
                {{ $loop->index + 1 }}.) {{ $math->question }} Answer: {{ $math->answer }} ({{ $math->verses }})
            </p>
            @endforeach
        @endif
    </div>
</body>

</html>
