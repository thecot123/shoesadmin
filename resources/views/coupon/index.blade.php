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


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800">{{ __('Coupon') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ Route('coupon.create') }}">Create Coupon</a></li>
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
          <h3 class="card-title">Coupon</h3>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          STT
                      </th>
                      <th style="width:20%">
                      Code
                      </th>
                      <th style="width:29%">
                      Expiry
                      </th>
                      <th style="width:10%">
                      Discount
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
              <tbody>
    @foreach($coupon as $index => $image)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>
            {{ $image->code }}
        </td>
        <td>
            {{ $image->expiry_date }}
        </td>
        <td>
            {{ $image->discount_amount }}
        </td>
        <td class="project-state">
            <span class="badge badge-success">Success</span>
        </td>
        <td class="project-actions text-right">
        <a class="btn btn-info btn-sm" href="{{ Route('coupon.edit', $image->id) }}">
                <i class="fas fa-pencil-alt"></i>
                Edit
            </a>
    <form action="{{ route('coupon.destroy', $image->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this coupon?')">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>
    </tr>
    @endforeach
</tbody>



          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  @endsection
