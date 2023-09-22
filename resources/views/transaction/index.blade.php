@extends('layouts.app')

@section('title','Data Transaksi')

@section('action')
        <a href="{{ route('transactions.create') }}" class="
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
                <h6 class="m-0 font-weight-bold text-primary">Transaksi</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Total Price</th>
                            <th>Received</th>
                            <th>Change Received</th>
                            <th>Transaction Type</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($transactions ?? [] as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item?->code ?? '-' }}</td>
                                <td>{{ $item?->total_price ?? '-' }}</td>
                                <td>{{ $item?->received ?? '-' }}</td>
                                <td>{{ $item?->change_received ?? '-' }}</td>
                                <td>{{ $item?->transaction_type ?? '-' }}</td>
                                <td>
                                    <form action="{{ route('transactions.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a type="button" href="{{ route('transactions.edit', $item->id) }}" class="btn-sm btn-shadow btn btn-info text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a type="button" href="{{ route('transactions.show', $item->id) }}" class="btn-sm btn-shadow btn btn-info text-white">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <button type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="btn-sm btn-shadow btn btn-danger text-white">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</div>
@endsection
