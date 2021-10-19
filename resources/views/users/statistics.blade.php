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
        <year-table class="col-5"/>
        <month-table class="col-5"/>
    </div>
    <div>
        <canvas id="myChart"></canvas>
    </div>
@endsection