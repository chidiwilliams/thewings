@extends('layouts.app')

@section('content')
<edit inline-template>
    <section class="edit-nomination-form">
        <nomination-form v-bind:old-nomination='JSONParse(`{{ $nomination }}`)' v-bind:update="true"></nomination-form>
    </section>
</edit>
@endsection
