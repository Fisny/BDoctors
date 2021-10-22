@extends('layouts.app')

@section('content')

<div class="container">

    <div class="container portfolio">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <img src="https://image.ibb.co/cbCMvA/logo.png" />
                    <div class="heading-title">Benvenuto nella tua Dashboard</div>
                </div>
            </div>
        </div>
        <div class="bio-info">
            <div class="main-dash">

    

                <div class="container">
                    <div class="row justify-content-center dash-button-container">

                        <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                            <div class="custom-card custom-cards-profile" id="orangex">   
                                <div class="card-body cards-menu">
                                    <div class="dashboard-links">                            
                                        <a href="{{ url('/') }}"><i class="bi bi-house"></i></a>
                                        <div class="on-hover-icon">Home</div>
                                    </div>    
                                </div>
                            </div>  
                        </div>   

                        <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                            <div class="custom-card custom-cards-profile" id="bluex">
                                <div class="card-body cards-menu" >
                                    <div class="dashboard-links">                            
                                        <a href="{{route('users.edit', $loggedUser)}}"><i class="bi bi-pencil-square"></i></a>
                                        <div class="on-hover-icon">Modifica</div>
                                    </div>    
                                </div>
                            </div>
                        </div>

                        <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                            <div class="custom-card custom-cards-profile" id="redx">   
                                <div class="card-body cards-menu">
                                    <div class="dashboard-links">                            
                                        <a href="{{route('messages')}}"><i class="bi bi-chat-left-dots"></i></a>
                                        <div class="on-hover-icon">Messaggi</div>
                                    </div>    
                                </div>
                            </div>  
                        </div>   
            
                        <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                            <div class="custom-card custom-cards-profile" id="yellowx">
                                <div class="card-body cards-menu">
                                    <div class="dashboard-links"> 
                                        <a href="{{route('reviews')}}"><i class="bi bi-card-text"></i></a>
                                        <div class="on-hover-icon">Recensioni</div>
                                    </div>    
                                </div>
                            </div>
                        </div>
            
                        <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col" ì>
                            <div class="custom-card custom-cards-profile" id="greenx">
                                <div class="card-body cards-menu">
                                    <div class="dashboard-links">                           
                                        <a href="{{route('sponsorship')}}"><i class="bi bi-cart-plus"></i></a>
                                        <div class="on-hover-icon">Shop</div>
                                    </div>    
                                </div>
                            </div>
                        </div>
            
                        <div class=" col-lg-2 col-md-6 col-sm-6 cards-profile-col">
                            <div class="custom-card custom-cards-profile" id="violetx">   
                                <div class="card-body cards-menu">
                                    <div class="dashboard-links">                            
                                        <a href="{{route('storic')}}"><i class="bi bi-currency-dollar"></i></a>
                                        <div class="on-hover-icon">Storico</div>
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

        </div>
    </div>


    
</div>



@endsection

