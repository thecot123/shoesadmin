@extends('layouts.admin')

@section('main-content')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="h3 mb-4 text-gray-800">{{ __('Category') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ Route('category.create') }}">Create Category</a></li>
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
          <h3 class="card-title">Brand</h3>
        <div class="card-body p-0">
        <table class="table table-striped projects">
  <thead>
    <tr>
      <th style="width: 1%">STT</th>
      <th style="width: 15%">Category Name</th>
      <th style="width: 15%">Slug</th>
      <th style="width: 15%" class="text-center">Status</th>
      <th style="width: 20%">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cate as $index => $item)
    <tr>
      <td>{{ $index + 1 }}</td>
      <td><a>{{ $item->name }}</a><br/></td>
      <td><p>{{ $item->slug }}</p></td>
      <td class="project-state">
        <span class="badge badge-success">Success</span>
      </td>
      <td class="project-actions text-right">
        <a class="btn btn-primary btn-sm" href="">
          <i class="fas fa-folder"></i> View
        </a>
        <a class="btn btn-info btn-sm" href="{{ Route('category.edit', $item->id) }}">
          <i class="fas fa-pencil-alt"></i> Edit
        </a>
        <form action="{{ route('category.destroy', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>
      </td>
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
