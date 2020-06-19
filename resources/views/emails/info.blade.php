
{{--@section('type', {{$type}} )
@endsection
--}}

@extends('emails.generic')

@section('message')
<p class="lead">Dear {{$username}}, you have been sent this e-mail automatically to inform you about sss. Please don't repond to this message.</p>
@endsection