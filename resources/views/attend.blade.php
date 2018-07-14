@extends('layouts.app')

@section('content')
    <section class="done get-iv">
        <div class="page-header">I'll be attending...</div>
        @if ($errors->any())
            <div class="card alert-card error links">
                <div>
                    @foreach ($errors->all() as $error)
                        @if ($errors->first("email") == "The email has already been taken.")
                            <div>
                                We already sent an invitation to that email address.
                                <a href="#resend" class="golden-link">Resend invitation</a>
                            </div>
                        @else
                            <div>{{ $error }}</div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('getIV') }}" class="get-iv-form">
            @csrf
            <div class="form-group">
                <label for="first-name" class="control-label">My first name is <span class="required-star">*</span></label>
                <input name="first-name" class="form-control" required >
            </div>
            <div class="form-group">
                <label for="last-name" class="control-label">My last name is <span class="required-star">*</span></label>
                <input name="last-name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last-name" class="control-label">I am <span class="required-star">*</span></label>
                <select name="type" class="form-control select-control">
                    <option value="graduate">A graduate!</option>
                    <option value="staff">A staff</option>
                    <option value="alumnus">An alumnus</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email" class="control-label">Send my IV to this email address <span class="required-star">*</span></label>
                <input name="email" type="text" class="form-control" required>
            </div>
            <br>
            <input type="submit" value="Send my IV" class="action-btn">
        </form>
    </section>
@endsection
