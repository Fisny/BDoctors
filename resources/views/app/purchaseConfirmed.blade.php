@extends('layouts.app')

@section('content')
<div class="container">

    <div class="container portfolio animate__animated animate__bounceInDown">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <img src="https://image.ibb.co/cbCMvA/logo.png" />
                    <div class="heading-title">Pagamento completato</div>
                </div>
            </div>
        </div>

        <div class="bio-info">
            <div class="purchase-message-container">
                <i class="fas fa-check animate__animated animate__flip"></i>
                <h2>Pagamento di {{$sponsorship->price}}€ confermato</h2>
                <h5>Complimenti, hai accesso al piano {{$sponsorship->name}}.</h5>
                <br>
                <div class="comeback-button">
                    <h6><a href="{{ route('home')}}">Dashboard</h6>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
