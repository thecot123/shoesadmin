@extends('layouts.admin')

@section('main-content')

<style>
    .horizontal-images ul.list-inline {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0px; /* Khoảng cách giữa các hình ảnh */
    }

    .horizontal-images ul.list-inline li {
        width: 100%;
    }
</style>
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
              <li class="breadcrumb-item"><a href="{{ Route('productimage.create') }}">Create ProductImage</a></li>
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
                      <th style="width:60%">
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
              @foreach($images->groupBy('product_id') as $productImages)
<tr>
    <td>
        {{ $loop->iteration }}
    </td>

    <td>
        <div class="horizontal-images">
            <ul class="list-inline">
                @foreach($productImages as $image)
                <li class="list-inline-item">
                    <img src="{{ asset('images/' . $image->photo) }}" alt="" style="width:20%">
                </li>
                @endforeach
            </ul>
        </div>
    </td>
    <td class="project-state">
        <span class="badge badge-success">Success</span>
    </td>
</tr>
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
