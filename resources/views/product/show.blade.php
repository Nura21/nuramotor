@extends('layouts.app')

@section('title','Detail Data UMKM '.$umkm->warga->name)

@section('action')
<a href="{{ route('umkm.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Back</a>
@endsection

@section('content')
<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-12">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="name" class="">Nama UMKM : </label>
                            <input name="name" id="name" class="form-control" readonly value="{{ $umkm?->name }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="block_id" class="">No. Blok : </label>
                            <input name="block_id" id="block_id" class="form-control" readonly value="{{ $umkm?->block_id }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="status" class="">Status : </label>
                            <input type="text" name="status" id="status" class="form-control" value="{{ $umkm?->status }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="phone" class="">Phone : </label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="12000......." value="{{ $umkm?->phone }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="description" class="">Deskripsi : </label>
                            <input type="text" name="description" id="description" class="form-control" value="{{ $umkm?->description }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="photo" class="">Foto UMKM :</label>
                            @foreach ($umkm?->photo as $key => $item)
                                <img src="{{ url('storage/images/'.$item) }}" width="100" height="100" alt="photo" srcset="">
                            @endforeach
                        </div>
                    </div>
                </div>
                @if(auth()->user()->role !== 'WARGA' && $umkm?->status !== 'DITERIMA')
                    <div class="form-row">
                        <div class="col-md-6">
                            <form action="{{ route('umkm.show', $umkm?->id) }}" method="GET">
                                <select name="status_update" id="status_update" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="DITERIMA">DITERIMA</option>
                                    <option value="DITOLAK">DITOLAK</option>
                                    <option value="DIAJUKAN">DIAJUKAN</option>
                                </select>
                                <div class="position-relative form-group mt-2">
                                    <button type="submit" class="btn-sm btn-primary text-white">Verifikasi Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>


    </div>

</div>
@endsection
