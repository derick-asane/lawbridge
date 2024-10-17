@extends('adminLayout')

@section('adminContent')
<div class="container">
    <h1>Join Meeting Lawyer</h1>

    <iframe
        allow="camera; microphone; fullscreen; display-capture"
        src="{{ $jitsiUrl }}"
        style="width: 100%; height: 500px; border: 0;">
    </iframe>
</div>
@endsection