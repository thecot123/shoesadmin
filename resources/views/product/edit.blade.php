@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 margin-bottom-20">
                <form action="{{ route('update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="ex">Name:</label>
                        <input id="ex" class="form-control" placeholder="Enter text" name="name" value="{{ $product->name }}">
                    </div>

                    <div class="form-group">
                        <label>Slug:</label>
                        <input class="form-control" placeholder="Enter text" name="slug" value="{{ $product->slug }}">
                    </div>

                    <div class="form-group">
                        <label>Discount:</label>
                        <input class="form-control" placeholder="Enter number" name="discount" value="{{ $product->discount }}">
                    </div>

                    <div class="form-group">
                        <label>Featured:</label>
                        <input class="form-control" placeholder="Enter text" name="featured" value="{{ $product->featured }}">
                    </div>

                    <div class="form-group">
                        <label>Quantity:</label>
                        <input class="form-control" placeholder="Enter number" name="quantity" value="{{ $product->quantity }}">
                    </div>

                    <div class="form-group">
                        <label for="tx">Description:</label>
                        <textarea id="tx" class="form-control" rows="3" name="description">{{ $product->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection

 