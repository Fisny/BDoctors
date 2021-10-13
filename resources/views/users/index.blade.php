@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="form-group">
            <select class="selectpicker mt-4 mb-2" data-show-subtext="false" data-live-search="true" name="specialization" required>
                <option value="">Cerca lo specialista</option>
                @foreach ($specializations as $spec)
                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                @endforeach
            </select>

        </div>
    </div>

</div>


@endsection