@extends('layouts.app')

@section('content')
<div class="container">
{{ $user->sponsorship[$indexLastSponsorship]->name }}
{{ $user->sponsorship[$indexLastSponsorship]->duration }}
<!-- {{ $user->sponsorship[$indexLastSponsorship]->pivot->created_at }} -->
{{ $user->sponsorship[$indexLastSponsorship]->pivot->date_end }}
 <br>
 <br>
 <br>

@for ($i = $indexLastSponsorship -1; ( $i >= $startIndex); $i--)
    {{ $user->sponsorship[$i]->pivot->date_end }}

@endfor
            </div>

@endsection