@extends('layouts.app')

@section('content')
<div class="container">
 {{$id}}
    <div id='app'>
      <search-component specialization-id="{{ $id }}"> sasa</search-component>
    </div>
</div>
    
@endsection
