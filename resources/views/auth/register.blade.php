@extends('auth.layouts.master')
@push('title')
    Register
@endpush
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('auth.user.register')}}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="f_name"  class="form-control" id="first_name" >
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="l_name" class="form-control" id="last_name" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="c_password">
                    </div>
                    <div class="form-group my-4">
                        <a href="{{route("auth.login")}}" class="text-primary">Already Register</a>
                        <button type="submit" class="btn btn-primary mt-2 float-end">Login</button>
                    </div>
                </form>

                    <div class="form-group">
                        <a href="" class="text-primary">Forget Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
