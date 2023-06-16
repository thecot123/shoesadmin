
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
  <!-- Main Content -->
   <div id="content">
        <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User activion</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Start Date</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $item)
    <tr>
      <td>{{ $item->name }}</td>
      <td>{{ $item->last_name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->created_at }}</td>
      <td>{{ $item->role }}</td>
      <td class="project-actions text-right">
        <a class="btn btn-info btn-sm" href="{{ route('users.edit', $item->id) }}">
          <i class="fas fa-pencil-alt"></i> Edit
        </a>
        <form action="{{ route('users.destroy', $item->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this users?')">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

 </div>


@endsection
