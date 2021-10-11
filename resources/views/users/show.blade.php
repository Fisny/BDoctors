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
            <div class="col-lg-3 col-xs-12 show-column contacts">
                <div class="box_pp">
                    <img class="profile_picture" src="{{$user->profile_pic}}" alt="{{$user->name}} {{$user->name}}'s photo">
                </div>
                <h4>{{$user->qualification}} {{$user->name}} {{$user->lastname}}</h4>
                {{-- Le 5 stelle indicano la media dei voti ricevuti. Magari conviene farlo in Vue? --}}
                <div class="rating">
                    {{-- Attualmente è solo un placeholder, le cinque stelle devono riempirsi a seconda della media dei voti --}}
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>
                {{-- Il testo di minor_text dovrebbe essere piccolo e in grigio --}}
                <span class="minor_text">Last updated: {{$user->updated_at}}</span>
                <h4>Contatti</h4>
                <div>
                    <span>Email: {{$user->email}} <br></span>
                    <span>Indirizzo: {{$user->address}} <br></span>
                </div>
            </div>

            <div class="col-lg-5 col-xs-12 show-column professional-info">
                {{-- Contiene informazioni professionali come curriculum, specializzazioni e tariffe(?) --}}
                <h2>Curriculum</h2>
                <p class="text-break">
                    {{$user->cv}}
                Did you know that Bootstrap is like a printer? Refuses to work and has a new problem every time!
                superduperlongwordireallyhopebootstrapbreaksthisoneanddoesntoverflowtotheothercontainercompletelywreckingmybeautifullayout
                </p>
                
            </div>

            <div class="col-lg-8 col-xs-12 show-column reviews">
                <div class="box_review">
                    <h4>Scrivi una recensione</h4>
                    <textarea class="new_review" name="" id="" cols="30" rows="10"></textarea>
                    <div class="button_review d-flex justify-content-end">
                        <button>Invia</button>
                    </div>
                </div>
                {{-- Contiene le recensioni e lo spazio per crearne una --}}
                <div>
                    <h3>Recensioni</h3>
                    {{-- Inserire componente per le review --}}
                    <div class="card-review">

                    </div>
                </div>
            </div>
        </div>
        
        
        
         
    </div>
@endsection