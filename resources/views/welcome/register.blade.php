@extends('sess.app')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('welcome.register') }}">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="form-group">
        <label for="username" class="control-label">Username:</label>
        <input type="text" id="username" name="username" class="form-control" value="">
        <p class="help-block"></p>
    </div>
    <div class="form-group">
        <label for="email" class="control-label">Email:</label>
        <input type="text" id="email" name="email" class="form-control" value="">
        <p class="help-block"></p>
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox" name="" id=""> Remember Me
        </label>
    </div>
    <textarea class="form-control" rows="3"></textarea>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
@stop
