@extends('layouts.app')

@section('content')
<nominations inline-template>
    <section class="nominations">
        @if(Request::get('s'))
            <div class="card alert-card success">
                <div class="alert-message">
                <span>The nomination was submitted successfully.</span>
                <span class="links alert-links"><a href="{{ route('nominate') }}">Submit a new nomination</a></span>
                </div>
            </div>
        @elseif(Request::get('e'))
            <div class="card alert-card success">
                <div class="alert-message">
                <span>The nomination was edited successfully.</span>
                <span class="links alert-links"><a href="{{ route('nominate') }}">Submit a new nomination</a></span>
                </div>
            </div>
        @elseif(Request::get('d'))
            <div class="card alert-card success">
                <div class="alert-message">The nomination was deleted successfully</div>
            </div>
        @elseif(Request::get('r'))
            <div class="card alert-card error">
                <div class="alert-message">There was an error processing your request.</div>
            </div>
        @endif

        @forelse($nominations as $nomination)
            <div class="card alert-card delete-panel" style="display: none" id="{{ 'nomination-delete-' . $nomination->id }}">
                <div class="row">
                    <div class="col-sm-8 col-md-7 col-lg-8">
                        <div class="nomination-delete-text">Are you sure you want to delete this nomination?</div>
                    </div>
                    <div class="col-sm-4 col-md-5 col-lg-4">
                        <div class="nomination-links links">
                            <a href="/delete" onclick="event.preventDefault(); document.getElementById('{{ 'delete-' . $nomination->slug }}').submit();">Delete</a>
                            <form style="display: none;" id="{{ 'delete-' . $nomination->slug }}" action="{{  route('delete', $nomination->slug) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <a class="nomination-delete" href="#" @click.stop.prevent="hideDeletePanel({{ $nomination->id }})">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="row nomination-header">
                    <div class="col-sm-8">
                        <div class="nomination-nominee">
                            {{ $nomination->nominee_first_name }} {{ $nomination->nominee_last_name }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="nomination-links links">
                            <a href="{{ '/nominations/' . $nomination->slug . '/edit' }}">Edit</a>
                            <a class="nomination-delete" href="{{ '/nominations/' . $nomination->slug . '/delete' }}" @click.stop.prevent="showDeletePanel({{ $nomination->id }})">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="nomination-group">
                    <div class="nomination-question">Student, staff, or alumnus?</div>
                    <div class="nomination-status nomination-answer pull-left">{{ $nomination->nominee_status }}</div>
                    <div class="clearfix"></div>
                </div>

                <div class="nomination-group">
                    <div class="nomination-question">Tell us about your nominee and what is special about his/her work</div>
                    <div class="nomination-answer pull-left">{{ $nomination->nominee_work }}</div>
                    <div class="clearfix"></div>
                </div>

                <div class="nomination-group">
                    <div class="nomination-question">Accomplishments and Impact: How is his/her work making a difference?</div>
                    <div class="nomination-answer pull-left">{{ $nomination->nominee_impact }}</div>
                    <div class="clearfix"></div>
                </div>

                <div class="nomination-group">
                    <div class="nomination-question">Are there any links you want to share? (articles, websites, social media...)</div>
                    <div class="nomination-answer pull-left">{{ $nomination->nominee_links }}</div>
                    <div class="clearfix"></div>
                </div>
            </div>
        @empty
            <div class="card alert-card">
                <div class="nominations-zero">No nominations submitted</div>
            </div>
        @endforelse
    </section>
</nominations>
@endsection
