@extends('layouts.admin')

@section('main-content')8

<h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 margin-bottom-20">
                <form action="{{ Route('update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="ex">Name :</label>
                        <input id="ex" class="form-control"  placeholder="Enter text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Slug :</label>
                        <input class="form-control" placeholder="Enter text" name="slug">
                    </div>
                    <div class="form-group">
                        <label>Price :</label>
                        <input class="form-control" placeholder="Enter number" name="price">
                    </div>
                    <div class="form-group">
                        <label>Size :</label>
                        <input class="form-control" placeholder="Enter number" name="size">
                    </div>
                    <div class="form-group">
                        <label>Quantity :</label>
                        <input class="form-control" placeholder="Enter number" name="quantity">
                    </div>
                    <div class="form-group">
                        <label>Photo :</label>
                        <input type="file" name="photo">
                    </div>
                    <div class="form-group">
                        <label for="tx">Description :</label>
                        <textarea id="tx" class="form-control" rows="3" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>


        </div>
    </div>

@endsection

