
@extends('layouts.admin')

@section('main-content')


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
        <a class="btn btn-danger btn-sm" href="{{ route('users.destroy', $item->id) }}">
          <i class="fas fa-trash"></i> Delete
        </a>
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
