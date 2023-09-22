@extends('layouts.app')

@section('title','Tambah Data UMKM')

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
            {{-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div> --}}
            <div class="card-body">
                <form class="" method="POST" action="{{ route('umkm.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="name" class="">Nama UMKM :</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="description" class="">Deskripsi UMKM :</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                                @if ($errors->has('description'))
                                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="phone" class="">No. Telepon :</label>
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="photo" class="">Foto UMKM :</label>
                                <input type="file" class="form-control" name="photo[]" value="{{ old('photo') }}" multiple>
                                @if ($errors->has('photo'))
                                    <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>


    </div>

</div>
@endsection
