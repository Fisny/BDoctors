@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="dash-background">
                <div class="dash-title">
                    <h1>Benvenuto nella tua Dashboard</h1> 
                </div>
            </div> 
        </div>
    </div>
</div>


<div class="main-dash">

    

    <div class="container">
        <div class="row justify-content-center">

            <div class=" col-lg-2 col-md-6 col-sm-6">
                <div class="card cards-profile">
                    <div class="card-body  cards-menu">
                        <div class="dashboard-links">                                                       
                            <a href="{{route('home')}}"><i class="bi bi-list"></i></a>
                            <div class="on-hover-icon">Menu</div>
                        </div> 
                    </div>
                </div>
            </div>

            <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                <div class="card cards-profile">
                    <div class="card-body cards-menu">
                        <div class="dashboard-links">                            
                            <a href="{{route('users.edit', $loggedUser)}}"><i class="bi bi-pencil-square"></i></a>
                            <div class="on-hover-icon">Edit</div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                <div class="card cards-profile">   
                    <div class="card-body cards-menu">
                        <div class="dashboard-links">                            
                            <a href="{{route('messages')}}"><i class="bi bi-chat-left-dots"></i></a>
                            <div class="on-hover-icon">Messaggi</div>
                        </div>    
                    </div>
                </div>  
            </div>   

            <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                <div class="card cards-profile">
                    <div class="card-body cards-menu">
                        <div class="dashboard-links"> 
                            <a href="{{route('reviews')}}"><i class="bi bi-card-text"></i></a>
                            <div class="on-hover-icon">Recensioni</div>
                        </div>    
                    </div>
                </div>
            </div>

            <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                <div class="card cards-profile">
                    <div class="card-body cards-menu">
                        <div class="dashboard-links">                           
                            <a href="{{route('sponsorship')}}"><i class="bi bi-cart-plus"></i></a>
                            <div class="on-hover-icon">Shop</div>
                        </div>    
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                <div class="card cards-profile">
                    <div class="card-body cards-menu">
                        <div class="dashboard-links">
                            <a href="{{route('statistics')}}"><i class="bi bi-bar-chart-line"></i></a>
                            <div class="on-hover-icon">Statistiche</div>
                        </div>    
                    </div>
                </div>
            </div>
                    


            <div class="col-md-12">
            
                    <div class="card-body-dash">
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

