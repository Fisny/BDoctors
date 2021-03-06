@extends('layouts.app')

@section('content')
    <div class="container">
        @php
                    use Illuminate\Support\Facades\Auth;
                    $loggedUser = Auth::user();
        @endphp
        {{-- SEZIONE PRINCIPALE - PROFILO --}}
        <div class="container portfolio">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <img src="https://image.ibb.co/cbCMvA/logo.png" />
                    <div class="heading-title">Profilo</div>
                    </div>
                </div>
            </div>
            <div class="bio-info">
                <div class="row">
                    <div class="col-md-6 imgcontainer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bio-image">
                                @php
                                use Illuminate\Support\Str;
                                @endphp
                                @if (Str::startsWith($user->profile_pic, 'images/'))
                                    <img class="profile_picture" src="{{asset('storage/' . $user->profile_pic)}}" alt="{{$user->name}} {{$user->name}}'s photo">
                                
                                @elseif(Str::endsWith($user->name,'a'))

                                    <div class="box_pp pb-3">
                                        <img class="profile_picture" src="/img/avatar-dottoressa.png" alt="Pfp placeholder">
                                    </div>
                
                                @else(Str::endsWith($user->name,'o'))

                                    <div class="box_pp pb-3">
                                        <img
                                        class="carousel-pfp"
                                        src="/img/avatar-doc-m.jpg"
                                        alt="Pfp placeholder"
                                        />
                                    </div>
    
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bio-content">
                            <h2>{{ $user->qualification }} {{ $user->name }} {{ $user->lastname }}</h2>
                            <h6>
                                @foreach ($user->specialization as $specialization)
                                    <span
                                        class="badge badge-info m-1 p-2 specialization-badge">{{ $specialization->name }}</span>
                                @endforeach
                            </h6>
                            <rating-static :vote="{{ $avgVote }}"></rating-static>

                            <span class="minor-text"><i class="bi minibi bi-broadcast"></i> Profilo aggiornato
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->updated_at)->locale('it_IT')->diffForHumans() }}</span>
                            
                            @if ($loggedUser == $user)
                                <div class="my-1 d-flex align-items-center" style="font-size:14px">
                                    <a class="d-flex align-items-center" href="{{url('users/'.$user->id.'/edit')}}">
                                        <button class="btn btn-primary"><i class="bi bi-pencil-square mr-2" style="font-size:14px"></i> Modifica Profilo</button>
                                    </a>
                                </div>
                            @endif

                            @if ($user->cv != null)
                                <h5><a href="{{ asset('storage/' . $user->cv) }}" target="_blank"
                                        rel="noopener noreferrer">Curriculum</a>
                                </h5>
                            @else
                                <h6><i><i class="bi minibi bi-file-earmark-person"></i> Curriculum non disponibile</i></h6>
                            @endif

                            <h5 class="pt-2">Contatti</h5>
                            <div>
                                <span><i class="bi minibi bi-mailbox2"></i> {{ $user->email }} <br></span>
                                <span><i class="bi minibi bi-signpost-2"></i> {{ $user->address }} <br></span>
                                
                                <!-- Componente per l'invio del nuovo messaggio -->
                                <new-message doctor-name="{{ $user->name }}"
                                    doctor-lastname="{{ $user->lastname }}" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEZIONE "OPERATIVA" (Commenti, Recensioni..) --}}

        {{-- Invia Recensioni --}}
        <div class="container review-container animate__animated animate__fadeIn">
            <div class="review-container-inside">
                
            @if ($loggedUser != $user)
                <div class="review">
                    <new-review></new-review>
                </div>
            @else 
                <div class="no-auto-review">Benvenuto in BDoctors, {{ $user->qualification }} {{ $user->name }} {{ $user->lastname }} </div>
            @endif
            </div>
        </div>




        {{-- Lista delle recensioni lasciate --}}
        <div class="container review-list-container animate__animated animate__fadeIn">
            @foreach ($user->reviews->reverse() as $review)
                <div class="card-review">
                    <h4>{{ $review->user_name }}</h4>
                    <rating-static :vote="{{ $review->vote }}"></rating-static>
                    <span class="minor-text">Aggiornato
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->updated_at)->locale('it_IT')->diffForHumans() }}<br></span>
                    <p class="text-break">
                        {{ $review->text }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>



















    </div>

@endsection
