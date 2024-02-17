@extends('auth.layouts.master')
@push('title')
    Register
@endpush
@section('content')

                    <form action="{{route('auth.user.register')}}" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" id="first_name" >
                    </div>
                    @if ($errors->has('first_name'))
                    <code>{{ $errors->first('first_name') }}</code>
                   @endif
                   <div class="form-group">
                       <label for="last_name">Last Name</label>
                       <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" id="last_name" >
                    </div>
                    @if ($errors->has('last_name'))
                    <code>{{ $errors->first('last_name') }}</code>
                   @endif
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" >
                    </div>
                    @if ($errors->has('email'))
                    <code>{{ $errors->first('email') }}</code>
                   @endif
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    @if ($errors->has('password'))
                    <code>{{ $errors->first('password') }}</code>
                   @endif
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    @if ($errors->has('password_confirmation'))
                    <code>{{ $errors->first('password_confirmation') }}</code>
                    @endif
                    <div class="form-group my-4">
                        <a href="{{route("auth.login")}}" class="text-primary">Already Register</a>
                        <button type="submit" class="btn btn-primary mt-2 float-end">Login</button>
                    </div>
                </form>

                    <div class="form-group">
                        <a href="{{route('auth.reset-password')}}" class="text-primary">Forget Password</a>
                    </div>
@endsection
