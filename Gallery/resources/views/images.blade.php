@extends('layout')
@section('content')
    <div class="container">
        <h1 align="center">My Gallery</h1>
        <div class="row">
            @if(!empty($imagesInView))
                @foreach($imagesInView as $image)
                    <div class="col-md-3 gallery-item">
                        <div>
                            <a href="images/show/{{$image->id}}"><img src="/{{$image->image}}" alt="" class="img-thumbnail"></a>
                        </div>
                    </div>
                @endforeach
            @else
                <h2>NOT@</h2>
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
