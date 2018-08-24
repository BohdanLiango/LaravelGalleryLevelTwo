@extends('layout')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <br>
                <h2 class="text-center font-weight-bold">Title</h2>
                <img src="/{{$imageInView}}" alt="" class="img-thumbnail gallery-image">
            </div>
            <div class="col-md-12">
                <hr>

                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link btn-success" href="#">Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Author: Bohdan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Date: 06.07.2018</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Size: 1.6Mb</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Category: Photo</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ex quos voluptates. Ad, adipisci alias
                    animi aperiam, autem beatae est hic, inventore ipsam ipsum minus mollitia nostrum officia quia
                    tempore!</p>
                <b>Tags:</b>
                <a href="#">photo</a>
                <a href="#">beautiful</a>
                <a href="#">beach</a>
            </div>
            <a href="/gallery" class="btn btn-info my-button">Go Back</a>
        </div>
    </div>

@endsection
