@extends('layouts.admin')

@section('main-content')8

<h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 margin-bottom-20">
                <form action="{{ Route('update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @foreach($products as $item)
                    <div class="form-group">
                        <label for="ex">Name :</label>
                        <input id="ex" class="form-control"  placeholder="Enter text" name="name" value="{{$item->name}}" >
                    </div>
                    @endforeach
                    @foreach($products as $item)
                    <div class="form-group">
                        <label>Slug :</label>
                        <input class="form-control" placeholder="Enter text" name="slug"  value="{{$item->slug}}">
                    </div>
                    @endforeach
                    @foreach($products as $item)
                    <div class="form-group">
                        <label>Price :</label>
                        <input class="form-control" placeholder="Enter number" name="price" value="{{$item->price}}">
                    </div>
                    @endforeach
                    @foreach($products as $item)
                    <div class="form-group">
                        <label>Featured:</label>
                        <input class="form-control" placeholder="Enter Text" name="featured" value="{{$item->slug}}">
                    </div>
                    @endforeach
                    @foreach($products as $item)
                    <div class="form-group">
                        <label>Quantity :</label>
                        <input class="form-control" placeholder="Enter number" name="quantity" value="{{$item->quantity}}">
</div>
@endforeach
@foreach($products as $item)
                    <div class="form-group">
                        <label for="tx">Description :</label>
                        <textarea id="tx" class="form-control" rows="3" name="description" value="{{$item->description}}"></textarea>
                    </div>
                    @endforeach


                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>


        </div>
    </div>

@endsection

