@extends('Layout')

@section('content')
<div class="container">
    <h1>Join Meeting, {{Auth::User()->username}}</h1>

    <iframe
        allow="camera; microphone; fullscreen; display-capture"
        src="{{ $jitsiUrl }}"
        style="width: 100%; height: 500px; border: 0;">
    </iframe>
</div>
@endsection