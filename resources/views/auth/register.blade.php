@extends('layout.app')

@section('title')
    Register
@endsection

@php
    use \App\Enums\UserRoleEnum;
    $userRoles = UserRoleEnum::toArray();
    $userRoles = array_filter($userRoles, function($role) {
        return $role !== UserRoleEnum::ADMIN->value;
    });
    $userRoles = array_values($userRoles);
@endphp


@section('body')


<div class="page-banner-area bg-2">
    <div class="container">
        <div class="page-banner-content">
            <h1>Register</h1>
            <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li>Register</li>
            </ul>
        </div>
    </div>
</div>


<div class="login-area pt-100 pb-70">
    <div class="container">
        <div class="login">
            <h3>Register</h3>
            <form>
                <div class="form-group">
                    <input type="name" id="name" required name="name" class="form-control" placeholder="Your name*">
                </div>
                <div class="form-group">
                    <input type="email" id="email" required name="email" class="form-control" placeholder="Email Address*">
                </div>
                <div class="form-group">
                    <input type="password" id="password" required name="password" class="form-control" placeholder="Password*">
                </div>
                <div class="form-group">
                    <select id="role" required name="role" class="form-control" placeholder="Password*">
                        <option value="" selected disabled>Register as?</option>
                        @forelse ($userRoles as $role)
                            <option value="{{$role}}">{{ucwords($role)}}</option>
                        @empty

                        @endforelse
                    </select>
                </div>
                <button type="submit" class="default-btn btn active">Register</button>
                <a href="{{route('login')}}">Already have an account?</a>
            </form>
        </div>
    </div>
</div>
@endsection
