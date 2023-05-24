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

<section class="container chat-box mt-5">

    <h1>Messaggi ricevuti</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Data</th>
                <th scope="col">Testo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="receivedmessage">
            @forelse($messages as $message)
                <tr>
                    <th scope="row">{{$message->apartment_id}}</th>
                    <td>{{$message->email}}</td>
                    <td>{{$message->name}}</td>
                    <td>{{$message->surname}}</td>
                    <td>{{$message->created_at}}</td>
                    <td>{{$message->getAbstract()}}</td>
                    <td>
                        <a href="{{route('admin.messages.show', $message)}}" title="Mostra il messaggio">
                            Mostra il messaggio
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td scope="row">Nessun risultato</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
</section>

@endsection

</body>
</html>