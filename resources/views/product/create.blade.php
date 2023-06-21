@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>
    <div class="container">
        <div class="row">
        <div class="col-md-8">
                <form action="{{ Route('productstore') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ex">Name :</label>
                        <input id="ex" class="form-control"  placeholder="Enter text" name="name">
                    </div>
                    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
                        <label for="ex">Sku :</label>
                        <input id="ex" class="form-control"  placeholder="Enter text" name="sku">
                    </div>
                    @error('sku')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Slug :</label>
                        <input class="form-control" placeholder="Enter text" name="slug">
                    </div>
                    @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Price :</label>
                        <input class="form-control" placeholder="Enter number" name="price">
                    </div>
                    @error('price')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Discount :</label>
                        <input class="form-control" placeholder="Enter number" name="discount">
                    </div>
                    @error('discount')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Featured:</label>
                        <input class="form-control" placeholder="Enter Text" name="featured">
                    </div>
                    @error('featured')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                    @error('photo')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label for="tx">Description :</label>
                        <textarea id="tx" class="form-control" rows="3" name="description"></textarea>
                    </div>
                    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Content :</label>
                        <input class="form-control" placeholder="Enter text" name="content">
                    </div>
                   <div class="form-group">
                        <label for="sel">Categories :</label>
                        <select id="sel" class="form-control" name="category">
                        @foreach($cates as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
                        </select>
                        </div>
<div class="form-group">
                        <label for="sel">Brand :</label>
                        <select id="sel" class="form-control" name="brand">
                        @foreach($brand as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="col-md-4">
    <label>Photo:</label>
    <input type="file" name="photo" id="photo" onchange="previewImage(event)">
    <br>
    <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
</div>

<script>
function previewImage(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById('preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>



    </div>

@endsection
