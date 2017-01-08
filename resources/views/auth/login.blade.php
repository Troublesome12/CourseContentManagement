@extends('master')

@section('title', 'Login')

@push('css')
    <link rel="stylesheet" href="{{ URL::to('src/css/login.css') }}">
@endpush

@section('content')
<div align='center' class="form">
    <form method="POST" action="{{ url('/login') }}">
        <h1>Login</h1>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit">Submit</button>
        </div>
        <div class="account-create"><span>Need an account? </span><a href="{{ url('/register') }}">Click here</a></div>
        <div class="form-group{{ Session::has('message') ? ' has-error' : '' }}">
            @if(Session::has('message'))
            <span class="help-block">
                <strong>{{ Session::get('message') }}</strong>
            </span>
            @endif
        </div>
    </form>
</div>
@endsection