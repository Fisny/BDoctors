@extends('users.dashboard_home')

@section('dashboard')
<div class="col-lg-12 col-xs-12 show-column reviews p-3">

@if (count($loggedUser->reviews) <= 0) <span class="minor-text">Nessuna recensione ricevuta.</span>

    @else
    <h2>Recensioni</h2>
    @foreach ($loggedUser->reviews->reverse() as $review)
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
@endif
</div>
@endsection


