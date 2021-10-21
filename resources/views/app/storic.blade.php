@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="page-title">
            <h1>Storico delle sponsorizzazioni</h1>
        </div>

        <div class="last-sponsorship-container">
            <div class="last-sponsorship-item">
                <h3>Ultima sponsorizzazione acquistata: {{ $lastSponsorshioName }}</h3>
                <h6>Dettagli:</h6>
                <ul>
                    <li>Durata: {{$lastSponsorshioDuration  }}</li>
                    <li>Data di scadenza: {{ $lastSponsorshioDateEnd }}</li>
                </ul>
                <div class="comeback-button-v2">
                    <h6><a href="{{ route('sponsorship') }}">Acquista una nuova sponsorizzazione</a></h6>
                </div>
            </div>

            {{-- Restituisce le ultime quattro sponsorizzazioni in ordine inverso --}}
            <div class="last-five">
                <h3>Le tue ultime sponsorizzazioni:</h3>
                @for ($i = $indexLastSponsorship-1 ; $i >= $startIndex; $i--)
                    <div class="last-five-item">
                        <h4>Piano 
                           @if ($user->sponsorship[$i]->id === 1) 
                                Bronze
                            @elseif ($user->sponsorship[$i]->id === 2)
                                Silver
                            @else
                                Gold
                            @endif
                        </h4>
                        <h6>Data di scadenza: {{ $user->sponsorship[$i]->pivot->date_end }}</h6>
                    </div>
                @endfor
            </div>




        </div>


    </div>

@endsection
