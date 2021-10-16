@extends('layouts.app')

@section('content')
<div class="p-1 container">

    <div class="row flex-wrap justify-content-center">
        <div class="col-lg-3 col-xs-12 mr-5 show-column contacts p-3">
            <div class="box_pp pb-3">
                @php
                use Illuminate\Support\Str;
                @endphp
                @if (Str::startsWith($user->profile_pic, 'images/'))
                    <img class="profile_picture" src="{{asset('storage/' . $user->profile_pic)}}" alt="{{$user->name}} {{$user->name}}'s photo">
                @else
                    <img class="profile_picture" src="https://aispt.it/wp-content/themes/gwangi/assets/images/avatars/user-avatar.png" alt="Pfp placeholder">
                @endif

            </div>
            <h4>{{$user->qualification}} {{$user->name}} {{$user->lastname}}</h4>
            {{-- Componente Vue della media delle recensioni --}}

            <rating-static :vote="{{$avgVote}}"></rating-static>
            {{-- Il testo di minor_text dovrebbe essere piccolo e in grigio --}}

            <span class="minor-text">Profilo aggiornato {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->updated_at)->locale('it_IT')->diffForHumans()}}</span>
            <h5 class="pt-2">Contatti</h5>
            <div>
                <span>Email: {{$user->email}} <br></span>
                <span>Indirizzo: {{$user->address}} <br></span>

                <!-- Componente per l'invio del nuovo messaggio -->
                <new-message doctor-name="{{ $user->name }}" doctor-lastname="{{ $user->lastname }}" />

            </div>
        </div>

        <div class="col-lg-6 col-xs-12 ml-5 show-column professional-info p-3">
            {{-- Contiene informazioni professionali come curriculum, specializzazioni e tariffe(?) --}}
            @if ($user->cv !=null)
            <h2><a href="{{asset('storage/' . $user->cv)}}" target="_blank" rel="noopener noreferrer">Curriculum</a></h2>
            @else
            <h2>Curriculum non disponibile</h2>
            @endif
            <p class="text-break">

            </p>
            <hr>
            <h2>Specializzazioni</h2>
            <span>
                @foreach ($user->specialization as $specialization)
                <span class="badge badge-info m-1 p-2 specialization-badge">{{$specialization->name}}</span>
                @endforeach
            </span>

        </div>

        <div class="col-lg-10 col-xs-12 show-column reviews p-3">
            <new-review></new-review>
            {{-- Contiene le recensioni e lo spazio per crearne una --}}

        </div>
        <div class="col-lg-10 col-xs-12 show-column reviews p-3">
            <h2>Recensioni</h2>

            @foreach ($user->reviews->reverse() as $review)
            {{-- Tentativo di implementarlo in Blade only --}}
            <div class="card-review">
                <h4>{{$review->user_name}}</h4>
                <rating-static :vote="{{$review->vote}}"></rating-static>
                <span class="minor-text">Aggiornato {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->updated_at)->locale('it_IT')->diffForHumans()}}<br></span>
                <p class="text-break">
                    {{$review->text}}
                </p>
            </div>

            @endforeach
        </div>
    </div>




</div>
@endsection