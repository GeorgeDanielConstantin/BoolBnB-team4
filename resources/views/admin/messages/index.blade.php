<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/svg+xml" href="/images/home-icon.png" />
    

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet" />
</head>
<body class="messagebody">
{{-- @section('title', 'Messages') --}}
@extends('layouts.app')

@section('content')

<section class="container-fluid chat-box mt-5">

    <h1>Message received</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Apartment</th>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Date</th>
                <th scope="col">Text</th>
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
                    <td>{{$message->created_at->format('d-m-Y H:i')}}</td>
                    <td>{{$message->getAbstract()}}</td>
                    <td>
                        <a href="{{route('admin.messages.show', $message)}}" title="Mostra il messaggio"> Show </a>
                        
                    </td>
                    <td><a href="{{ route('admin.messages.edit', $message) }}" data-bs-toggle="modal" data-bs-target="#delete-message-modal-{{ $message->id }}">
                    Delete</a></td>
                </tr>
                @empty
                <tr>
                    <td scope="row">No message received</td>
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
                    <h1 class="modal-title fs-5" id="delete-message-modal-{{ $message->id }}-label">Delete message from -<strong>{{ $message->name }} {{ $message->surname }}</strong> - </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    This message will be deleted. <br> Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('admin.messages.destroy', $message)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

</body>
</html>