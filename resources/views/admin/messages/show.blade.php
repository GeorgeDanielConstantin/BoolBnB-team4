<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap"
    rel="stylesheet"
  />
</head>
<body class="messagebody">
    @extends('layouts.app')

@section('content')
    <section class="container chat-box text-center mt-5">

        <h1 class="my-4">Messaggio da {{$message->email}}</h1>

        <div class="card">
            <div class="card-body">
                <p>
                    {{$message->message}}
                </p>
            </div>
        </div>
    </section>
@endsection
</body>
</html>