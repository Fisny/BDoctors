@extends('users.dashboard_home')

@section('dashboard')
<div class="p-2">
    @if (count($loggedUser->messages) <= 0) <span class="minor-text">Nessun messaggio ricevuto.</span>
        @else
        @foreach ($loggedUser->messages->reverse() as $message)
        <div class="mt-2 card-message p-4">
            <h4 class="card-title">{{$message->name}} {{$message->lastname}}</h4>
            <span class="message-email">{{$message->email}}</span>
            <span class="minor-text">Ricevuto {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->updated_at)->locale('it_IT')->diffForHumans()}}<br></span>
            <p class="card-text message-preview">{{$message->text}}</p>
            <div class="message-buttons">
                

                <!-- Button trigger modal -->

                <form action="{{route('messages.delete', $message)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash pr-1"></i>Elimina messaggio</button>
                </form>

               
            </div>

        </div>
        @endforeach
        @endif

</div>
@endsection