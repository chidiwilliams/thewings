@extends('layouts.app')

@section('content')
<nominate inline-template>
<section class="nomination-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                <div class="page-heading">
                    <div class="page-heading-main">Nominate</div>
                    <div class="page-heading-instructions">
                        <div class="page-heading-instructions-head">Please read the following before you nominate:</div>
                    </div>
                </div>

                <ol class="links">
                    <li>In order to be eligible for The Wings Awards, nominees must be Eagles, graduating students or staff.</li>
                    <li>Self-nominations will not be accepted.</li>
                    <li>You can submit only <u>three</u> entries.</li>
                    <li> <b>Read more about the terms <a href="/terms" class="golden-link">here</a>.</b> </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-md-6 offset-md-3">
                @if(Auth::user()->nominations->count() === App\User::MAX_NOMINATIONS)
                    <alert-card v-bind:message="'You have completed your nominations. Thank you for nominating.'" v-bind:classType="'success'"></alert-card>
                @else
                    <nomination-form v-on:submitted="submitted"></nomination-form>
                @endif
            </div>
        </div>
    </div>
</section>
</nominate>
@endsection

@section('css')

@endsection
