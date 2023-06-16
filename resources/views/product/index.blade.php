@extends('layouts.admin')

@section('main-content')

@if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800">{{ __('Product') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ Route('create') }}">Create Product</a></li>
            </ol>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ Route('productdetail.create') }}">Create ProductDetail</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product</h3>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          STT
                      </th>
                      <th style="width: 15%">
                          Product name
                      </th>
                      <th style="width: 6%">
                          Price
                      </th>
                      <th style="width: 6%">
                          Size
                      </th>
                      <th style="width: 15%">
                      Description
                      </th>
                      <th style="width:15%">
                      Photo
                      </th>
                      <th style="width: 15%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
    @foreach($products as $index => $product)
    <tr>
        <td>
            {{ $index + 1 }}
        </td>
        <td>
            <a>
                {{ $product->name }}
            </a>
            <br/>
        </td>
        <td>
            <p>
                {{ $product->price }}
            </p>
        </td>
        <td>
    @foreach($prdtel as $i)
        @if($i->product_id == $product->id)
            {{ $i->size }}
        @endif
    @endforeach
</td>


        <td>
            <p>
                {{ $product->description }}
            </p>
        </td>
        <td>
        <ul class="list-inline">
    @foreach($images as $image)
        @if($image->product_id == $product->id)
            <li class="list-inline-item" style="width=50px;">
                <img src="{{ asset('images/' . $image->photo) }}" alt="" style="width:100%">
            </li>
            @break  <!-- Dừng vòng lặp sau khi lấy hình ảnh đầu tiên -->
        @endif
    @endforeach
</ul>

        </td>
        <td class="project-state">
            <span class="badge badge-success">Success</span>
        </td>
        <td class="project-actions text-right">
            <a class="btn btn-info btn-sm" href="{{ Route('edit', $product->id) }}">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
    <form action="{{ route('destroy', $product->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>
    <!-- ... -->
@endforeach


</td>
    </tr>
</tbody>


          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  @endsection
