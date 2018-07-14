@extends('layouts.app')

@section('content')
    <section class="done get-iv">
        <div class="page-header">I'll be attending...</div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
