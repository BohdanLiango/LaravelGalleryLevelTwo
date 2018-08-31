@extends('layout')

@section('content')


    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <br>
                <h2 class="text-center font-weight-bold">{{$imageInView->title}}</h2>
                <img src="/{{$imageInView->image}}" alt="" class="img-thumbnail gallery-image">
            </div>
            <div class="col-md-12">
                <hr>

                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link btn-success" href="#">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Author: {{$imageInView->user['name']}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Date: {{$imageInView->date_upload}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Size: 1.6Mb</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category: {{$imageInView->category['title']}}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <hr>
                <p>{{$imageInView->description}}</p>
                <b>Tags:</b>
                <a href="#">photo</a>
                <a href="#">beautiful</a>
                <a href="#">beach</a>
            </div>
            <a href="/gallery" class="btn btn-info my-button">Go Back</a>
        </div>
    </div>

@endsection
