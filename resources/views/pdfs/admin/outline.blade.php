<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bible Outline PDF</title>
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
        <h4>Theme: <span style="font-size: 12pt;">"{{ $outline->theme }}"</span></h4>
        <h4>Text Passage: {{ $outline->text }}</h4> 
        <h4>Supporting Text: {{ $outline->support_text }}</h4>       
        <h4>Keyword: {{ $outline->keyword }}</h4>  
        <h4>Proposition: {{ $outline->proposition }}</h4> 
        <br>
        <h4>Introduction: {{ $outline->introduction }}</h4>         
        @if($outline->points->count() > 0)
            <br>
            <h4>Main Points</h4>
            @foreach($outline->points as $point)
                <h4 style="margin-left: 10;">{{ $loop->index + 1 }}.) {{ $point->main }} ({{ $point->verse }})</h4>
                @if($point->subpoints->count() > 0)
                    @foreach($point->subpoints as $subpoint)
                        <h4 style="margin-left: 30px;">- {{ $subpoint->sub }} ({{ $subpoint->verse }})</h4>    
                        <h4 style="margin-left: 35px;">{{ $subpoint->body }}</h4>
                        <br>
                    @endforeach
                @endif
            @endforeach      
        @endif
        <br>  
        <h4>Conclusion: {{ $outline->conclusion }}</h4>  
    </div>
</body>

</html>
