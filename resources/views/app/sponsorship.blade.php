@extends('layouts.app')

@section('content')
<div class="container">
    <div class="sponsorship-title">
        <h2>Scegli una sponsorizzazione</h2>
        <h5>In questo modo risulterai più visibile ed avrai un vantaggio rispetto agli altri medici.</h5>
    </div>
    <div class="sponsorship-list-container">
        <div class="sponsorship-card">
            <h1>BRONZE</h1>
            <i class="bi bi-emoji-smile"></i>
            <p>Piano base. Otterrai <b>24 ore</b> di sponsorizzazione al prezzo di 2,99€</p>
            <a href="{{ url('/checkout/1') }}" class="sponsorship-button"><h5>Acquista <i class="bi bi-piggy-bank"></i></h5></a>
        </div>
        <div class="sponsorship-card">
            <h1>SILVER</h1>
            <i class="bi bi-emoji-sunglasses"></i>
            <p>Piano intermedio. Otterrai <b>72 ore</b> di sponsorizzazione al prezzo di 5,99€</p>
            <a href="{{ url('/checkout/2') }}" class="sponsorship-button"><h5>Acquista <i class="bi bi-piggy-bank"></i></h5></a>
        </div>
        <div class="sponsorship-card">
            <h1>GOLD</h1>
            <i class="bi bi-emoji-heart-eyes"></i>
            <p>Piano Super! Otterrai <b>144 ore</b> di sponsorizzazione al prezzo di 9,99€</p>
            <a href="{{ url('/checkout/3') }}" class="sponsorship-button"><h5>Acquista <i class="bi bi-piggy-bank"></i></h5></a>
        </div>
    </div>
</div>
@endsection
