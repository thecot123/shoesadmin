
@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Product Photo') }}</h1>
    <div class="container">
        <div class="row">
        <form action="{{ Route('banner.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Photo :</label>
                        <input type="file" name="photo">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>

                </div>


    </div>

@endsection
