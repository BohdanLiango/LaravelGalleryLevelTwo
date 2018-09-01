@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <br>
            <div class="align-content-center">
                <h4>User Info</h4>
                <h5>Name:</h5>
                <p>{{$user->name}}</p>
                <a href="/profile/panel" class="btn btn-warning">Config My Photo</a>
                <a href="/profile/exit" class="btn btn-danger">Exit</a>
                <hr>
                <br>
                <h5>Related Photo:</h5>
                <div class="container">
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
                </div>
            </div>
        </div>
    </div>
@endsection
