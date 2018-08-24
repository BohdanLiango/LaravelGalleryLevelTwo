@extends('layout')

@section('content')
    <div class="container">
        <h1 align="center">My Gallery</h1>
        <hr>

        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="gallery/create">Add image</a>
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
                            <a href="gallery/show/{{$image->id}}" class="btn btn-info my-button">Show</a>
                            <a href="gallery/edit/{{$image->id}}" class="btn btn-warning my-button">Edit</a>
                            <a href="gallery/delete/{{$image->id}}" class="btn btn-danger my-button" onclick="return confirm('are yo sure?')">Delete</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>NOTHING</h2>
            @endif

        </div>
        <br>
        <hr>
        <div class="center row">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
