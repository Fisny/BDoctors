@extends('layouts.app')

@section('content')
<div class="container">
    <div id='app'>
      <checkout-component sponsorship-id="{{ $id }}"></checkout-component>
    </div>
</div>
    
@endsection