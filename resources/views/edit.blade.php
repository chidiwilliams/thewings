@extends('layouts.app')

@section('content')
<edit inline-template>
    <section class="edit-nomination-form">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <div class="page-heading">
              <div class="page-heading-main">Editing nomination</div>
            </div>
            <nomination-form v-bind:old-nomination='JSONParse(`{{ $nomination }}`)' v-bind:update="true"></nomination-form>
          </div>
        </div>
      </div>
    </section>
</edit>
@endsection
