@extends('layouts.app')

@section('title','Data UMKM')

@if(auth()->user()->role === 'WARGA')
    @section('action')
        {{-- <a href="{{ route('umkm.create') }}" class="
            d-none
            d-sm-inline-block
            btn
            btn-sm
            btn-primary
            shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>
            Tambah Data
        </a> --}}
    @endsection
@endif

@section('content')
<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-12">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">UMKM</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama UMKM</th>
                            <th>Warga</th>
                            <th>No. Blok</th>
                            <th>Status</th>
                            <th>Approval At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($umkm ?? [] as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                {{-- <td>{{ $item?->name ?? '-' }}</td>
                                <td>{{ $item?->warga?->name ?? '-' }}</td>
                                <td>{{ $item?->blok?->block_number ?? '-' }}</td>
                                <td>{{ $item?->status ?? '-' }}</td>
                                <td>{{ $item?->approval_at ?? '-' }}</td> --}}
                                <td>
                                    {{-- <form action="{{ route('umkm.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group">
                                            <a type="button" href="{{ route('umkm.show', $item->id) }}" class="btn-sm btn-shadow btn btn-primary text-white">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a type="button" href="{{ route('umkm.edit', $item->id) }}" class="btn-sm btn-shadow btn btn-info text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini?')" class="btn-sm btn-shadow btn btn-danger text-white">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </form> --}}
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
