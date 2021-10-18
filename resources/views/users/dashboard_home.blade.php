@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-2">
            <div class="card cards-profile">
                <div class="card-body cards-menu">
                    <div class="dashboard-links">
                        <h6>
                            <a href="{{route('users.edit', $loggedUser)}}">Modifica Profilo <div><i class="bi bi-pencil-square"></i></div></a>
                        </h6>
                    </div>    
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card cards-profile">   
                <div class="card-body cards-menu">
                    <div class="dashboard-links">
                        <h6>
                            <a href="{{route('messages')}}">Messaggi <div><i class="bi bi-chat-left-dots"></i></div></a>
                        </h6>
                    </div>    
                </div>
            </div>  
        </div>   

        <div class="col-md-2">
            <div class="card cards-profile">
                <div class="card-body cards-menu">
                    <div class="dashboard-links">
                        <h6>
                            <a href="{{route('reviews')}}">Recensioni <div><i class="bi bi-card-text"></i></div></a>
                        </h6>
                    </div>    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card cards-profile">
                <div class="card-body cards-menu">
                    <div class="dashboard-links">
                        <h6>
                            <a href="">Sponsorizzazione <div><i class="bi bi-cart-plus"></i></div></a>
                        </h6>
                    </div>    
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card cards-profile">
                <div class="card-body cards-menu">
                    <div class="dashboard-links">
                        <h6>
                            <a href="">Statistiche <div><i class="bi bi-bar-chart-line"></i></div></a>
                        </h6>
                    </div>    
                </div>
            </div>
        </div>
                


        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{route('home')}}">Dashboard di {{$loggedUser->name}} {{$loggedUser->lastname}}</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                    @yield('dashboard')
                </div>
            </div>
        </div>
               
            
        
        
    </div>
</div>
@endsection

