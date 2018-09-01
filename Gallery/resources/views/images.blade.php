@extends('layout')
@section('content')
    <div class="container">
        <h1 align="center">My Gallery</h1>
        <hr>

        <ul class="nav nav-pills nav-fill">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($categories as $category)
                    <a class="dropdown-item" href="#">{{$category->title}}</a>
                        @endforeach
                </div>
            </li>
        </ul>
        <hr>
        <div class="row">


            @if(!empty($imagesInView))
                @foreach($imagesInView as $image)
                    <div class="col-md-3 gallery-item">
                        <div>
                            <a href="gallery/show/{{$image->id}}"><img src="/{{$image->image}}" alt=""
                                                                       class="img-thumbnail"></a>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>NOT@</h2>
            @endif
        </div>
        <br>
        <hr>
        {{ $imagesInView->links() }}
    </div>
@endsection
