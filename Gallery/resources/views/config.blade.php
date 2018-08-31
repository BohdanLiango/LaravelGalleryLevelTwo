@extends('layout')

@section('content')
    <div class="container">
        <h1 align="center">My Gallery</h1>
        <hr>

        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="create">Add image</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Longer nav link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <hr>

        <div class="row">
            @if(!empty($imagesInView))
                @foreach($imagesInView as $image)
                    <div class="col-md-4 gallery-item">
                        <div class="col-md-8 float-md-left">
                            <img src="/{{$image->image}}" alt="" class="img-thumbnail rounded">
                        </div>
                        <div class="col-md-4 float-md-right">
                            <a href="show/{{$image->id}}" class="btn btn-info my-button">Show</a>
                            <a href="edit/{{$image->id}}" class="btn btn-warning my-button">Edit</a>
                            <a href="delete/{{$image->id}}" class="btn btn-danger my-button"
                               onclick="return confirm('are yo sure?')">Delete</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>NOTHING</h2>
            @endif

        </div>
        <br>
        <hr>
        {{ $imagesInView->links() }}
    </div>
@endsection
