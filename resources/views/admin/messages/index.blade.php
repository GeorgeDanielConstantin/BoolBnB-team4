@extends('layouts.app')

@section('content')

<section class="container">

    <h1>Mesaggi ricevuti</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Testo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
                <tr>
                    <th scope="row">{{$message->id}}</th>
                    <td>{{$message->email}}</td>
                    <td>{{$message->name}}</td>
                    <td>{{$message->surname}}</td>
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

    {{ $messages->links() }}

</section>

@endsection