@extends('alerts.base_alert')

@section('title')
    Failure!
@endsection

@section('content')
    <div class="alert alert-danger mt-3">
        User is not a member of this house!
    </div>
@endsection
