@extends('layouts.app')

@section('content')
<nominate inline-template>
<section class="nomination-form">
    <div class="card page-heading">
        <div class="cards-header">Before you nominate, please read the following...</div>

        <ol class="links">
            <li>In order to be eligible for The Wings Awards, nominees must be Eagles, graduating students or staff.</li>
            <li>Self-nominations will not be accepted.</li>
            <li>You can submit only <u>three</u> entries.</li>
            <li> <b>Read more about the terms <a href="/terms" class="golden-link">here</a>.</b> </li>
        </ol>
    </div>

    @if(Auth::user()->nominations->count() === App\User::MAX_NOMINATIONS)
        <alert-card v-bind:message="'You have completed your nominations. Thank you for nominating.'" v-bind:classType="'success'"></alert-card>
    @else
        <nomination-form v-on:submitted="submitted"></nomination-form>
    @endif
</section>
</nominate>
@endsection

@section('css')

@endsection
