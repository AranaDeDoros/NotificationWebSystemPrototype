@extends('emails.generic')

@section('message')
<p class="lead">Dear {{$username}}, you have been sent this e-mail automatically because of {{$customMessage}}. Please don't repond to this message.</p>
@endsection