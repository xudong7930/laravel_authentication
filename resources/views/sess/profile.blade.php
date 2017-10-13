@extends('sess.app')

@section('content')
<h1>Your profile</h1>
<p>
    welcome back.
    <a href="{{ route('sess.logout') }}">logout</a>
</p>
@stop
