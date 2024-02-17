@extends('auth.layouts.master')

@push('title')
    Reset Password
@endpush

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{route('auth.reset-user-password')}}" method="POST">
        @csrf
        <p class="text-danger">Enter email address we will send you password reset link</p>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" >
        </div>
        @if ($errors->has('email'))
        <code>{{ $errors->first('email') }}</code>
       @endif
       <div class="form-group my-4">
        <a href="{{route("auth.login")}}" class="text-primary">Back to login</a>
        <button type="submit" class="btn btn-primary mt-2 float-end">Send Link</button>
    </div>
    </form>
@endsection
