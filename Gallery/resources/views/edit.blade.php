@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Edit Image</h1>
                @foreach($errors->all() as $error)
                    <h4 style="color: red">{{$error}}</h4> <br>
                @endforeach
                <img src="/{{$imageInView->image}}" alt="" class="img-thumbnail">
                <form action="/gallery/update/{{$imageInView->id}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-control">
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-warning"> Edit</button>
                    <a href="/panel" class="btn btn-info my-button">Go Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
