@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <select class="selectpicker" data-live-search="true" data-live-search-style="startsWith">
            <option value="">Cerca</option>
            @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

    </div>

</div>


@endsection