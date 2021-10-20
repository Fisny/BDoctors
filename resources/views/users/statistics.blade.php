@extends('users.dashboard_home')

@section('statistics')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('dashboard')
    <div>
        <p>Un medico ha la possibilità di vedere le seguenti statistiche:
            numero di messaggi e recensioni ricevute per mese/anno
            grafico a barre fasce di voto ricevuti per mese/anno
        </p>
    </div>
    <div class="row flex-column">
        <div class="statistics-table col-5">
            <year-table :yearsarray="{{json_encode($yearsArray)}}" :loggeduserid="{{$loggedUser->id}}"/>
        </div>
        <div class="statistics-table col-5">
            <month-table/>
        </div>
    </div>
    
    <div class="row flex-column">
        <div class="statistics-graph col-5">
            <year-graph></year-graph>
        </div>
        <div class="statistics-graph col-5">
            
        </div>
    </div>
@endsection