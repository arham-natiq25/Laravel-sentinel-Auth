@extends('auth.layouts.master')
@push('title')
    Login
@endpush
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group my-4">
                        <a href="{{route('auth.register')}}" class="text-primary">Sign up</a>
                        <button type="submit" class="btn btn-primary mt-2 float-end">Login</button>
                    </div>
                </form>

                    <dov class="form-group">
                        <a href="" class="text-primary">Forget Password</a>
                    </dov>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
