@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 margin-bottom-20">
                <form action="{{ Route('productdetail.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="sel">Name Product :</label>
                    <select id="sel" class="form-control" name="id">
                        @foreach($product as $item)

             <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
</select>
</div>
                    <div class="form-group">
                        <label>Quantity :</label>
                        <input class="form-control" placeholder="Enter number" name="quantity">
                    </div>
                    @error('quantity')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Size :</label>
                        <input class="form-control" placeholder="Enter number" name="size">
                    </div>
                    @error('size')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Color :</label>
                        <input class="form-control" placeholder="Enter text" name="color">
</div>
@error('color')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>


        </div>
    </div>

@endsection
