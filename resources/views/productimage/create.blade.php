
@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">{{ __('Product Photo') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 margin-bottom-20">
                <form action="{{ Route('productimage.store') }}" method="post"  enctype="multipart/form-data">
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
<label>Photo:</label>
    <input type="file" name="photo" id="photo" onchange="previewImage(event)">
    <br>
    <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px; display: none;">
 

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
</div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>

            </div>


        </div>
 </div>

@endsection
