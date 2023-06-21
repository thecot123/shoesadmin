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
                <h1 class="h3 mb-4 text-gray-800">{{ __('Order') }}</h1>
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
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">STT</th>
                        <th style="width: 10%">Name</th>
                        <th style="width: 12%">Address</th>
                        <th style="width: 10%">Email</th>
                        <th style="width: 7%">Phone</th>
                        <th style="width:10%">Product Name</th>
                        <th style="width: 5%">Size</th>
                        <th style="width: 5%">Quantity</th>
                        <th style="width: 5%">Total</th>
                        <th style="width: 10%">payment</th>
                        <th style="width: 10%">status</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $index => $orderItem)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <p>{{ $orderItem->first_name }} {{ $orderItem->last_name }}</p>
                            <br/>
                        </td>
                        <td>
                            <p>{{ $orderItem->address }}</p>
                            <br/>
                        </td>
                        <td>
                            <p>{{ $orderItem->email }}</p>
                            <br/>
                        </td>
                        <td>
                            <p>{{ $orderItem->phone }}</p>
                            <br/>
                        </td>
                        @foreach ($items as $item)
            @if ($item->order_id == $orderItem->id)
                <td>
                    @php
                        $product = $product->find($item->product_id);
                    @endphp
                    <p>{{ $product->name }}</p>
                </td>
            @endif
            @endforeach
            <td>
                            <p>{{ $item->size }}</p>
                            <br/>
                        </td>
                        <td>
                            <p>{{ $item->quantity }}</p>
                            <br/>
                        </td>
                        <td>
                            <p>{{ $item->total }}</p>
                            <br/>
                        </td>
                        <td>
                            <p>{{ $orderItem->payment_type }}</p>
                            <br/>
                            </td>
                            <td>
                            <p>{{ $orderItem->status }}</p>
                            <br/>
                            </td>
                            <td>
    <form action="{{ route('order.confirm', ['id' => $orderItem->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="status" onchange="this.form.submit()">
            <option value="Pending" {{ $orderItem->status === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Confirmed" {{ $orderItem->status === 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="Canceled" {{ $orderItem->status === 'Canceled' ? 'selected' : '' }}>Canceled</option>
        </select>
    </form>
</td>
<td>
<form action="{{ route('order.destroy', $orderItem->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?')">
        <i class="fas fa-trash"></i> Delete
    </button>
</form>
</td>

      

    </tr>
    <td>
</td>
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
