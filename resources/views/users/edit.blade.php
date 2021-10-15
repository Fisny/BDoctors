@extends('home')

@section('dashboard')
@php

use App\Specialization;
use Illuminate\Support\Facades\Auth;

$specializations = Specialization::all();
$loggedUser = Auth::user();

@endphp

<div class="card-body">

    <form method="POST" action="{{ route('users.update', $loggedUser) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $loggedUser->name }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

            <div class="col-md-6">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $loggedUser->lastname }}" required autocomplete="lastname" autofocus>

                @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="profile_pic" class="col-md-4 col-form-label text-md-right">{{ __('Foto Profilo') }}</label>

            <div class="col-md-6">
                @if ($loggedUser->profile_pic)
                    
                    <img width=150 src="{{asset('storage/' . $loggedUser->profile_pic)}}" alt="attuale immagine">
                    <h6 class="mt-1">Attuale foto del profilo</h6>
                @endif
                <input id="profile_pic" type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" autocomplete="profile_pic" autofocus>

                @error('profile_pic')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo e-mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $loggedUser->email }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $loggedUser->address }}" required autocomplete="address" autofocus>

                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="cv" class="col-md-4 col-form-label text-md-right">{{ __('Curriculum Vitae') }}</label>

            <div class="col-md-6">
                @if ($loggedUser->cv)
                    
                    
                    <h6 class="mt-1"><a href="{{asset('storage/' . $loggedUser->cv)}}" target="_blank" rel="noopener noreferrer">Attuale curriculum</a></h6>
                @endif
                <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" autocomplete="cv" autofocus>

                @error('cv')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="qualification" class="col-md-4 col-form-label text-md-right">{{ __('Qualifica') }}</label>

            <div class="col-md-6">
                <input id="qualification" type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ $loggedUser->qualification }}" required autocomplete="qualification" autofocus>

                @error('qualification')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="specializations" class="col-md-4 col-form-label text-md-right">{{ __('Specializzazioni') }}</label>

            <div class="form-check col-md-6 mx-3 mt-2">
                <!-- <input id="specializations" type="text" class="form-control @error('specializations') is-invalid @enderror" name="specializations" value="{{ $loggedUser->specializations }}" required autocomplete="specializations" autofocus>

                @error('specializations')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror -->
                @foreach ($specializations as $specialization)
                @if ($loggedUser->specialization->contains($specialization))
                <input name="specializations[]" id="specializations" class="form-check-input d-block @error('specializations') is-invalid @enderror" type="checkbox" value="{{ $specialization->id }}" checked>
                @else
                <input name="specializations[]" id="specializations" class="form-check-input d-block @error('specializations') is-invalid @enderror" type="checkbox" value="{{ $specialization->id }}">
                @endif

                <label class="form-check-label d-block" for="specializations">

                    {{ $specialization->name }}

                </label>

                @endforeach
                @error('specializations')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{$loggedUser->password}}">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required value="{{$loggedUser->password}}">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Salva Modifiche') }}
                </button>
            </div>
        </div>
        @endsection