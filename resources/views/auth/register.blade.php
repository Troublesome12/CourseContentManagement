@extends('master')

@section('title', 'Registration')

@push('css')
    <link rel="stylesheet" href="{{ URL::to('src/css/login.css') }}">
@endpush

@section('content')
<div align='center'>
    <form class="registration-form" method="POST" action="{{ url('/register') }}">
        <h1>Register</h1>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
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
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>
        {{ csrf_field() }}
        <div class="form-group">
            <button type="submit">Register</button>
        </div>
        <div class="account-create"><span>Already a member? </span><a href="{{ Route('login') }}">Log In</a></div>
    </form>
</div>
@endsection