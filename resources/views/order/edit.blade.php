@extends('layouts.app')

@section('title','Ubah Data Order')

@section('action')
<a href="{{ route('orders.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Back</a>
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
                <form class="" method="POST" action="{{ route('orders.update', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="product_id" class="">Product :</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="">Pilih:</option>
                                    @foreach ($products ?? [] as $key => $item)
                                        <option value="{{ $item->id }}" {{ $item->id === $order->product_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('product_id'))
                                    <span class="text-danger text-left">{{ $errors->first('product_id') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="type" class="">Type :</label>
                                <select name="type_id" id="type_id" class="form-control">
                                    <option value="{{ $order->type_id }}" selected>{{ $order->type->name }}</option>
                                </select>
                                @if ($errors->has('type_id'))
                                    <span class="text-danger text-left">{{ $errors->first('type_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="qty" class="">Qty :</label>
                                <input type="number" class="form-control" name="qty" value="{{ $order->qty }}">
                                @if ($errors->has('qty'))
                                    <span class="text-danger text-left">{{ $errors->first('qty') }}</span>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="price" class="">Price :</label>
                                <input type="number" class="form-control" name="price" id="price" value="{{ $order->price }}">
                                @if ($errors->has('price'))
                                    <span class="text-danger text-left">{{ $errors->first('price') }}</span>
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

@push('scripts')
<script>
    $(document).ready(function () {
        $('#product_id').change(function () {
            let productId = $('#product_id').val(); // Use single curly braces for variables
            let typeUrl = "{{ route('getTypeByIds') }}";
            if (productId) {
                $.ajax({
                    type: "GET",
                    url: typeUrl,
                    data: {
                        product_id: productId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        $('#type_id').empty();
                        $.each(data, function (key, value) {
                            for(let i =0; i<=value.length-1; i++){
                                if(value[i] !== undefined){
                                    $('#type_id').append('<option value="' + value[i].types.id + '">' + value[i].types.name + '('+value[i].types.color + ')</option>');
                                    $('#price').val(value[i].types.price)
                                }
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX request failed:", status, error);
                    }
                });
            } else {
                $('#type_id').empty();
            }
        });
    });
</script>
@endpush
