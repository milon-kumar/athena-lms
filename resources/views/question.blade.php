<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .text-editor-image p img{
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto mb-4">
                <div class="text-center">
                    <h3>{{ $exam->name ?? '' }}</h3>
                    <p>{!! $exam->description ?? '' !!}</p>
                    <p class="float-start">Time : {{ $exam->minutes ?? '' }}</p>
                    <p class="float-end">Max Time : {{ $exam->times ?? '' }}</p>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-8 mx-auto">
                    @foreach($question as $question)
                        <div class="card mb-2">
                            <div class="card-body">
                                <h6 class="font-bold fw-bold text-editor-image">Q{{ $loop->iteration }} . {!! $question->question ?? '' !!}</h6>
                                <div style="margin-left: 25px;">
                                    @if($question->options)
                                        @foreach(json_decode($question->options ?? []) as $key => $options)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input border border-dark" type="radio" name="question{{$question->id}}[answer]" id="answer-label-{{$key}}">
                                                <label style="cursor: pointer;" class="form-check-label" for="answer-label-{{$key}}">{{ $options ?? '' }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</body>
</html>
