@extends('layouts.app')

@section('css')
<style>
    /* div.big {
        margin-top: 20px;
        max-width: 520px;
        line-height: 1;
        text-transform: uppercase;
        font-weight: bolder;
        color: #dab800;
        font-size: 30px;

        @media (min-width: 768px) {
            font-size: 60px;
        }

        @media (min-width: 992px) {
            font-size: 70px;
        }
    }

    div.small {
        font-weight: lighter;
        font-size: 25px;
        color: #bbb;
        font-style: italic;
    }

    div.cta {
        margin-top: 40px;
    } */
</style>
@endsection

@section('content')
    <section class="done">
        <div class="big">Nominations are now closed</div>
        <div class="small">Thank you for participating</div>

        <div class="cta">
            <div class="cta-text" style="font-size: 20px;"><a href="{{ route('welcome') }}" class="gold golden-link">Learn more</a> about The Wings Ceremony 2018</div>
        </div>
    </section>
@endsection
