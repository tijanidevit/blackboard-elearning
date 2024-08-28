@extends('layout.app')

@section('title')
    Login
@endsection


@section('body')


<div class="page-banner-area bg-2">
    <div class="container">
        <div class="page-banner-content">
            <h1>Login</h1>
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Login</li>
            </ul>
        </div>
    </div>
</div>


<div class="login-area pt-100 pb-70">
    <div class="container">
        <div class="login">
            <h3>Login</h3>
            <form>
                <div class="form-group">
                    <input required type="email" id="email" class="form-control" placeholder="Username Or Email Address*">
                </div>
                <div class="form-group">
                    <input required type="password" id="password" class="form-control" placeholder="Password*">
                </div>
                <div class="form-check">
                    <input class="form-check-input" checked type="checkbox" value id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember Me
                    </label>
                </div>
                <button type="submit" class="default-btn btn active">Login</button>
                <a href="{{route('register')}}">New here?</a>
            </form>
        </div>
    </div>
</div>
@endsection
