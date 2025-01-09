<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bible Quiz PDF</title>
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
        @if($quizzes->count())
        <h4>Bible Quiz - {{ ($level == '' || $level == null || empty($level)) ? 'All' : $level }}</h4>
        @foreach ($quizzes as $quiz)
        <p>
            {{ $loop->index + 1 }}.) {{ $quiz->question }} Answer: {{ $quiz->answer }} ({{ $quiz->verse }})
        </p>
        @endforeach
        @endif
    </div>
</body>

</html>
