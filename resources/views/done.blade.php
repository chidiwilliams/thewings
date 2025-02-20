@extends('layouts.app')

@section('content')
    <section class="done">
        <div class="big">Nominations are now closed</div>
        <div class="small">Thank you for participating</div>

        <div class="cta">
            <div class="cta-text" style="font-size: 20px;"><a href="{{ route('ceremony') }}" class="gold golden-link">Learn more</a> about The Wings Ceremony 2018</div>
        </div>
    </section>
@endsection
