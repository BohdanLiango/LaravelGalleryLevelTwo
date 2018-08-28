@extends('layout')
@section('content')
    <div class="container">
        <h1 align="center">My Gallery</h1>
        <div class="row">
            @if(!empty($imagesInView))
                @foreach($imagesInView as $image)
                    <div class="col-md-3 gallery-item">
                        <div>
                            <a href="gallery/show/{{$image->id}}"><img src="/{{$image->image}}" alt="" class="img-thumbnail"></a>
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
