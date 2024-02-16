@extends('auth.layouts.master')
@section('content')

<p>This message is for your email activation:</p>


<a href="{{ route('auth.email.active', ['token' => $token]) }}">
    <button class="btn btn-danger">
        Activate Your Account
    </button>
</a>
<p>
    Thank you for choosing {{ config('app.name') }}. Click the button above to activate your account and start enjoying our services.
</p>

<p>
    If you didn't request this activation or have any questions, please contact our support team at {{ config('mail.support_email') }}.
</p>

<p>Thanks,<br>
    {{ config('app.name') }}
</p>

@endsection
