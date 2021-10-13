@extends('layouts.app')

@section('content')
    <div class="p-1 container">
        {{-- Attributes: 
            name 
            lastname
            email
            address
            qualification
            specialization
            profile_pic
            cv (add later)

            timestamps(optional)
            rating (optional)
        --}}
        <div class="row flex-wrap">
            <div class="col-lg-3 col-xs-12 show-column contacts p-2">
                <div class="box_pp">
                    <img class="profile_picture" src="{{$user->profile_pic}}" alt="{{$user->name}} {{$user->name}}'s photo">
                </div>
                <h4>{{$user->qualification}} {{$user->name}} {{$user->lastname}}</h4>
                {{-- Componente Vue del rating. Come calcolare la media delle recensioni? --}}
                
                <rating-static :vote="{{$avgVote}}"></rating-static>
                {{-- Il testo di minor_text dovrebbe essere piccolo e in grigio --}}
                <span class="minor_text">Last updated: {{$user->updated_at}}</span>
                <h4>Contatti</h4>
                <div>
                    <span>Email: {{$user->email}} <br></span>
                    <span>Indirizzo: {{$user->address}} <br></span>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary bdoctor-button" data-toggle="modal" data-target="#exampleModal">
                        Manda un messaggio
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Messaggio privato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="post">
                                    {{-- 
                                        nome
                                        email
                                        contenuto messaggio
                                     --}}
                                     <div class="form-group">
                                        {{-- nome --}}
                                        <div class="form-row">
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="Nome">
                                            </div>
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="Cognome">
                                            </div>
                                        </div>
                                     </div>

                                     <div class="form-group">
                                         {{-- email --}}
                                        <label for="exampleInputEmail1">Indirizzo email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <small id="emailHelp" class="form-text text-muted">Solo tu e {{$user->name}} {{$user->lastname}} conoscerete la tua email.</small>
                                     </div>

                                     <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Contenuto messaggio</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                     </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-primary bdoctor-button">Invia</button>
                            </div>
                        </div>
                        </div>
  </div>
  
                </div>
            </div>

            <div class="col-lg-5 col-xs-12 show-column professional-info p-2">
                {{-- Contiene informazioni professionali come curriculum, specializzazioni e tariffe(?) --}}
                <h2>Curriculum</h2>
                <p class="text-break">
                    {{$user->cv}}
                Did you know that Bootstrap is like a printer? Refuses to work and has a new problem every time!
                superduperlongwordireallyhopebootstrapbreaksthisoneanddoesntoverflowtotheothercontainercompletelywreckingmybeautifullayout
                </p>
                <hr>
                <h2>Specializzazioni</h2>
                <span>
                    @foreach ($user->specialization as $specialization)
                        {{$specialization->name}}
                    @endforeach
                </span>
                
            </div>

            <div class="col-lg-8 col-xs-12 show-column reviews p-2">
                <new-review></new-review>
                {{-- Contiene le recensioni e lo spazio per crearne una --}}
                <div>
                    <h2>Recensioni</h2>
                    
                    @foreach ($user->reviews as $review)
                        {{-- Tentativo di implementarlo in Blade only --}}
                        <div class="card-review">
                            <h4>{{$review->user_name}}</h4>
                            <rating-static :vote="{{$review->vote}}"></rating-static>
                            <span class="minor-text">Aggiornato a {{$review->updated_at}}<br></span>
                            <p class="text-break">
                                {{$review->text}}
                            </p>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
        
        
        
         
    </div>
@endsection