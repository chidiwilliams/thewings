@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="wings">The Wings Awards</div>
        <div class="brought">Rise above the norm...</div>

        <div class="sign-in-req">Please sign in to nominate your hero</div>
        <a href="{{ route('google') }}" class="google-link">
            <img src="{{ asset('img/google_btn.png') }}" alt="Sign in with Google" class="google-image">
        </a>
    </section>
@endsection
