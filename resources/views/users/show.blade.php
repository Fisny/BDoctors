@extends('layouts.app')

@section('content')
    <div class="p-5">
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
        
        <img class="profile_picture" src="{{$user->profile_pic}}" alt="{{$user->name}} {{$user->name}}'s photo">
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
            <span>CV: {{$user->cv}} <br></span>
        </div>
        
        <div class="reviews">
            
            <h2>Recensioni</h2>
            {{-- Inserire componente per le review --}}
        </div>
         
    </div>
@endsection