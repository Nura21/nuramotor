@extends('layouts.app')

@section('title','Tambah Data Product')

@section('action')
<a href="{{ route('products.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Back</a>
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
                <form class="" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="name" class="">Nama Product :</label>
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
                                <label for="image" class="">Image :</label>
                                <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                                @if ($errors->has('image'))
                                    <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="description" class="">Deskripsi :</label>
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
                                <label for="price" class="">No. Telepon :</label>
                                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="status" class="">Status :</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih : </option>
                                    <option value="{{ $status[0] }}">{{ $status[0] }}</option>
                                    <option value="{{ $status[1] }}">{{ $status[1] }}</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="qty" class="">Qty :</label>
                                <input type="number" class="form-control" name="qty" value="{{ old('qty') }}">
                                @if ($errors->has('qty'))
                                    <span class="text-danger text-left">{{ $errors->first('qty') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="type" class="">Type :</label>
                                <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                                @if ($errors->has('type'))
                                    <span class="text-danger text-left">{{ $errors->first('type') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="color" class="">Color :</label>
                                <select name="color" id="color" class="form-control">
                                    <option value="">Pilih : </option>
                                    @foreach($colors as $color)
                                        <option value="{{ $color }}">{{ $color }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('color'))
                                    <span class="text-danger text-left">{{ $errors->first('color') }}</span>
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
