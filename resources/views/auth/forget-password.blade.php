@extends('auth.layouts.master')

@push('title')
    Forget Password
@endpush

@section('content')
        <form action="{{ route('auth.password.update', ['token' => $token]) }}" method="POST">
            @csrf
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
            <button type="submit" class="btn btn-primary mt-2 float-end">Update Password</button>
        </div>
    </form>
@endsection
