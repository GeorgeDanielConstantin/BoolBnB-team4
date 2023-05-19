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

    
</section>

@endsection

{{-- modale --}}
@section('modals')
    @foreach ($messages as $message)
        <div class="modal fade" id="delete-message-modal-{{ $message->id }}" tabindex="-1" aria-labelledby="delete-message-modal-{{ $message->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-message-modal-{{ $message->id }}-label">Elimina l'appartamento n°{{ $message->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    L'appartamento <strong>{{ $message->title }}</strong> sarà eliminato. Sei sicuro?
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