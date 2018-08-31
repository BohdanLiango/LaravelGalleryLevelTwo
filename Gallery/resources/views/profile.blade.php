@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <br>
            <div class="align-content-center">
                <h4>User Info</h4>
                <h5>Name:</h5><p>{{$user->name}}</p>
                <a href="/profile/panel" class="btn btn-warning">My Photo</a>
                <a href="/profile/exit" class="btn btn-danger">Exit</a>
                <hr>
                <br>
                <h5>Related Photo:</h5>
            </div>
        </div>
    </div>
@endsection
