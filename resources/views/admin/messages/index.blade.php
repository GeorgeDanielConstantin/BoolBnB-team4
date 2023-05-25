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
                <th scope="col">Appartamento</th>
                <th scope="col">Email</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Data</th>
                <th scope="col">Testo</th>
                <th scope="col">Actions</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="receivedmessage">
            @forelse($messages as $message)
                <tr>
                    <th scope="row">{{$message->apartment->title}}</th>
                    <td>{{$message->email}}</td>
                    <td>{{$message->name}}</td>
                    <td>{{$message->surname}}</td>
                    <td>{{$message->created_at}}</td>
                    <td>{{$message->getAbstract()}}</td>
                    <td>
                        <a href="{{route('admin.messages.show', $message)}}" title="Mostra il messaggio"> Mostra </a>
                        
                    </td>
                    <td><a href="{{ route('admin.messages.edit', $message) }}" data-bs-toggle="modal" data-bs-target="#delete-message-modal-{{ $message->id }}">Elimina</a></td>
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

@section('modals')
    @foreach ($messages as $message)
        <div class="modal fade" id="delete-message-modal-{{ $message->id }}" tabindex="-1" aria-labelledby="delete-message-modal-{{ $message->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-message-modal-{{ $message->id }}-label">Elimina il messaggio di <strong>{{ $message->name }} {{ $message->surname }}</strong> </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Questo messaggio sarà eliminato. Sei sicuro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, annulla</button>
                    <form method="POST" action="{{ route('admin.messages.destroy', $message)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-primary">Sì, elimina</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

</body>
</html>