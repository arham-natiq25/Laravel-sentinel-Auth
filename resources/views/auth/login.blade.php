@extends('auth.layouts.master')
@push('title')
    Login
@endpush
@section('content')

                    @if ($errors->has('login'))
                    <code>{{ $errors->first('login') }}</code>
                   @endif
                    <form action="{{route("auth.user.login")}}" method="POST">
                        @csrf
                        @method('POST')
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email"  value="{{old('email')}}" name="email" class="form-control" id="email" >
                    </div>
                    @if ($errors->has('email'))
                    <code>{{ $errors->first('email') }}</code>
                   @endif
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    @if ($errors->has('password'))
                    <code>{{ $errors->first('password') }}</code>
                   @endif
                    <div class="form-group my-4">
                        <a href="{{route('auth.register')}}" class="text-primary">Sign up</a>
                        <button type="submit" class="btn btn-primary mt-2 float-end">Login</button>
                    </div>
                </form>

                    <dov class="form-group">
                        <a href="" class="text-primary">Forget Password</a>
                    </dov>
@endsection
