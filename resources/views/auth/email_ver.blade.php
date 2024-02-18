@extends('auth.layouts.master')
@push('title')
    Email Verification Page
@endpush
@section('content')
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    <p>Your email has been send </p>

    <a href="{{route('auth.resend-email')}}">
        <button class="btn btn-warning">Resend</button>
    </a>


@endsection
