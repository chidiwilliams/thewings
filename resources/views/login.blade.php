@extends('layouts.app')

@section('css')
<style lang="scss">
.login {
    margin-top: 30px;
    margin-bottom: 60px;
}

.sign-in-label {
    text-align: center;
}

.google-link {
    display: block;
    margin: 5px auto;
    max-width: 225px;
}

.google-image {
    width: 100%;
}
</style>
@endsection

@section('content')
    <section class="login">
        <div class="lighten sign-in-label">Please sign in to make a nomination</div>

        <a href="{{ route('google') }}" class="google-link">
            <img src="{{ asset('img/google_btn.png') }}" alt="Sign in with Google" class="google-image">
        </a>
    </section>
@endsection
