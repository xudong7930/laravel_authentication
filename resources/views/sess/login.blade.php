@extends('sess.app')

@section('content')
<h1>Login please</h1>
<form method="POST" action="{{ route('sess.login') }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="form-group">
        <label for="username" class="control-label">Username:</label>
        <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" />
    </div>
    <div class="form-group">
        <label for="password" class="control-label">Password:</label>
        <input type="text" id="password" name="password" class="form-control" value="" />
    </div>
    <button class="btn btn-primary">Submit</button>
</form>
@stop
