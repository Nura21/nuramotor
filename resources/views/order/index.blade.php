@extends('layouts.app')

@section('title','Data Order')

@section('action')
        <a href="{{ route('orders.create') }}" class="
            d-none
            d-sm-inline-block
            btn
            btn-sm
            btn-primary
            shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Data
        </a>
@endsection

@section('content')
<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-12">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Product</th>
                            <th>Type</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders ?? [] as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item?->type?->product?->name ?? '-' }}</td>
                                <td>{{ $item?->type?->name ?? '-' }}</td>
                                <td>{{ $item?->qty ?? '-' }}</td>
                                <td>{{ $item?->price ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('orders.destroy', $item?->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a type="button" href="{{ route('orders.edit', $item?->id) }}" class="btn-sm btn-shadow btn btn-info text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" href="{{ route('orders.show', $item?->id) }}" class="btn-sm btn-shadow btn btn-info text-white">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <button type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="btn-sm btn-shadow btn btn-danger text-white">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
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
@endsection
