@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Add Image</h1>
                @foreach($errors->all() as $error)
                    <h4 style="color: red">{{$error}}</h4> <br>
                @endforeach
                <form action="store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-control">
                        <h5>Title</h5>
                        <input type="text" name="title">
                        <h5>Description</h5>
                        <textarea type="text" name="description"></textarea>
                        <br>
                        <h5>Image</h5>
                        <input type="file" name="image">
                        <br>
                        <h5>Category</h5>
                        @foreach($categories as $category)
                            <input type="radio" name="category" value="{{$category->id}}" checked>{{$category->title}}<br>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-success"> Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
