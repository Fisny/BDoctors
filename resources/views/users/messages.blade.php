@extends('users.home')

@section('dashboard')
    <div class="p-2">
        @if (count($loggedUser->messages) <= 0)
            <span class="minor-text">Nessun messaggio ricevuto.</span>
        @else
            @foreach ($loggedUser->messages->reverse() as $message)
                <div class="mt-2 card-message p-4">
                    <h4 class="card-title">{{$message->name}} {{$message->lastname}}</h4>
                    <span class="message-email">{{$message->email}}</span>
                    <span class="minor-text">Ricevuto {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->updated_at)->locale('it_IT')->diffForHumans()}}<br></span>
                    <p class="card-text message-preview">{{$message->text}}</p>
                    <div class="message-buttons">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-view-{{$message->id}}">
                            <i class="bi bi-chat-right-text-fill pr-1"></i> Visualizza Messaggio
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="modal-view-{{$message->id}}" tabindex="-1" aria-labelledby="viewMessage" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title" id="viewMessage">{{$message->name}} {{$message->lastname}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <span class="message-email">{{$message->email}}</span>
                                    <span class="minor-text">Ricevuto {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->updated_at)->locale('it_IT')->diffForHumans()}}<br></span>
                                    <p class="card-text">{{$message->text}}</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi messaggio</button>
                                </div>
                            </div>
                            </div>
                        </div>
  
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger delete-message" data-toggle="modal" data-target="#modal-delete-{{$message->id}}">
                            <i class="bi bi-trash pr-1"></i> Cancella Messaggio
                        </button>
                        
                        <!-- Delete Modal -->
                        <div class="modal fade" id="modal-delete-{{$message->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    
                </div>
            @endforeach
        @endif
        
    </div>
@endsection