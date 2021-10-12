@extends('layouts.app')

@section('content')
<div class="container">
    <div id='app'>
      <!-- Carico una props recuperando l'id dall'indirizzo tramite il web.php -->
      <search-component specialization-id="{{ $id }}"> sasa</search-component>
    </div>
</div>
    
@endsection
