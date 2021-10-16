@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <ul class="dashboard-links">
                        <li><a href="{{route('users.edit', $loggedUser)}}">Modifica Informazioni</a></li>
                        <li><a href="{{route('messages')}}">Messaggi Ricevuti</a></li>
                        <li><a href="{{route('reviews')}}">Recensioni Ricevute</a></li>
                        <li><a href="">Sponsorizzazione Profilo</a></li>
                        <li><a href="">Statistiche Profilo</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                    <h2>Pagina personale di {{$loggedUser->name}} {{$loggedUser->lastname}}</h2>
                    @yield('dashboard')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
