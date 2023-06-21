
@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Coupon') }}</h1>
    <div class="container">
        <div class="row">
        <form action="{{ Route('coupon.update',$coupon->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="ex">Code :</label>
                        <input id="ex" class="form-control"  placeholder="Enter text" name="code">
                    </div>
                    @error('code')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
                        <label for="ex">Discount :</label>
                        <input id="ex" class="form-control"  placeholder="Enter text" name="discount_amount">
                    </div>
                    @error('discount_amount')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<div class="form-group">
                        <label for="ex">Expiry :</label>
                        <input type ="date"id="ex" class="form-control"  placeholder="Enter text" name="expiry_date">
                    </div>
                    @error('')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
               <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </form>

                </div>

    </div>

@endsection
