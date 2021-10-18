@extends('layouts.app')

@section('content')
<div class="container">
    <div class="purchase-message-container">
        <i class="bi bi-hand-thumbs-up"></i>
        <h2>Pagamento di {{$sponsorship->price}}€ confermato</h2>
        <h5>Complimenti, hai accesso al piano {{$sponsorship->name}}.</h5>
        <br>
        <div class="comeback-button">
            <h6><a href="{{ url('/app')}}">Ritorna alla home</h6>
        </div>
    </div>

</div>
@endsection
