@extends('users.home')

@section('dashboard')
    <div>
        @if (count($loggedUser->messages) <= 0)
            <span class="minor-text">Nessun messaggio ricevuto.</span>
        @else
            @foreach ($loggedUser->messages->reverse() as $message)
                <div>
                    <h2>{{$message->name}} {{$message->lastname}}</h2>
                    <h3>{{$message->email}}</h3>
                    <span class="minor-text">Ricevuto {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->updated_at)->locale('it_IT')->diffForHumans()}}<br></span>
                    <p>{{$message->text}}</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-{{$message->id}}">
                        <i class="bi bi-trash"></i> Cancella Messaggio
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modal-{{$message->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content modal-dark">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deleting post...</h5>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler cancellare il messaggio?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <form action="{{route('messages.delete', $message)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina messaggio</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        
    </div>
@endsection