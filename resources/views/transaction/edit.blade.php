@extends('layouts.app')

@section('title','Ubah Data Product')

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
                <form class="" method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="name" class="">Nama Product :</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name ?? '-' }}">
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

                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <button type="button" class="btn" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                <img src="{{ asset('storage/img/'.$product->image) }}" width="300" height="200" alt="image" srcset="">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <img src="{{ asset('storage/img/'.$product->image) }}" alt="image" srcset="">
                                        </div>
                                    </div>
                                </div>
                                
                                <input type="file" class="form-control" name="image" value="{{ $product->image }}">
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
                                <input type="text" class="form-control" name="description" value="{{ $product->description }}">
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
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
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
                                    @foreach($status as $stat)
                                        <option value="{{ $stat }}" {{ $product->status === $stat ? 'selected' : ''}}>{{ $stat }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-danger text-left">{{ $product->status }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="qty" class="">Qty :</label>
                                <input type="number" class="form-control" name="qty" value="{{ $product->qty }}">
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
                                <input type="text" class="form-control" name="type" value="{{ $product->type->name }}">
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
                                        <option value="{{ $color }}" {{ $product->type->color === $color ? 'selected' : ''}}>{{ $color }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('color'))
                                    <span class="text-danger text-left">{{ $errors->first('color') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mt-2 btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
