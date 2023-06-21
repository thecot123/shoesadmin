
@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Inform') }}</h1>
    <div class="container">
        <div class="row">
        <form action="{{ Route('inform.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
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
                    <div class="form-group">
                        <label>Title :</label>
                        <input class="form-control" placeholder="Enter text" name="title">
                    </div>  
                    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                     <div class="form-group">
                        <label>Content :</label>
                        <input class="form-control" placeholder="Enter text" name="content">
                    </div>
                    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>

                </div>


    </div>

@endsection
