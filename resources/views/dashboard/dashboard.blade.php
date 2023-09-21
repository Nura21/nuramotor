@extends('layouts.app')
@section('title',' Dashboard')
@section('content')

@if (auth()->user()->role == "WARGA" && auth()->user()->warga->status == "WAITING")
    @include('dashboard.partials.waiting')
@elseif (auth()->user()->role == "WARGA" && auth()->user()->warga->status == "REJECT")
    @include('dashboard.partials.reject')
@else

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ number_format($total_pemasukan) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengeluaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ number_format($total_pengeluaran) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">UMKM</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($umkm) }}</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Block Rumah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($block) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">UMKM Aktif</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTableUmkm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Warga</th>
                                <th>Nomor Telpon</th>
                                <th>No Block</th>
                                <th>Deskripsi</th>
                                <th>Photo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($umkm as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->blok->block_number ?? '' }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        @foreach (json_decode($item->photo) as $key => $item)
                                            <img src="{{ url('storage/images/'.$item) }}" width="100" height="100" alt="photo" srcset="">
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Block Rumah</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="dataTableBlock">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Blok / Rumah</th>
                                <th>Nama Penghuni</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($block as $key => $item)
                                @php
                                    $warga = \App\Models\Warga::where('block_id', $item->id)->orderByDesc('id')->first();
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->block_number }}</td>
                                    <td>{{ $warga->name ?? '' }}</td>
                                    <td>{{ $warga->type ?? 'KOSONG' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endif
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#dataTableUmkm').DataTable();
        $('#dataTableBlock').DataTable();
    });
</script>
@endpush
