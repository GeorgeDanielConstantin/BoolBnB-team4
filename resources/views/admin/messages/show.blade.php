@extends('layouts.app')

@section('content')
    <section class="container text-center">

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