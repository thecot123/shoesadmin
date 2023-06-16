@extends('layouts.admin')

@section('main-content')

<h1 class="h3 mb-4 text-gray-800">{{ __('Brand') }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 margin-bottom-20">
                <form action="{{ Route('brand.store') }}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="ex">Name :</label>
                        <input id="ex" class="form-control"  placeholder="Enter text" name="name">
                    </div>
                    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    <div class="form-group">
                        <label>Slug :</label>
                        <input class="form-control" placeholder="Enter text" name="slug">
                    </div>
                    @error('slug')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>
            </div>


        </div>
    </div>

@endsection
