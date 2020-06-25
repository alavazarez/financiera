@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ __('New Loan') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('prestamos.index') }}" class ="btn btn-danger">
                            {{ __('Cancel')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('prestamos.store') }}" method="POST">
                    @csrf
                    <div class="form-group form-row">
                        <div class="col-md-8">
                            <label for ="name">{{ __('Name') }}</label>
                            <select name ="name" id="id" class="form-control">
                                @foreach ($clients as $client)
                                    <option value ="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for ="cantidad">{{ __('Cantidad') }}</label>
                            <input type="text" name ="cantidad" id="cantidad" class="form-control @error('cantidad') is-invalid @enderror">
                            @error('cantidad')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-4">
                            <label for ="noPagos">{{ __('Numero de pagos') }}</label>
                            <input type="text" name ="noPagos" id="noPagos" class="form-control @error('noPagos') is-invalid @enderror">
                            @error('noPagos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for ="cuota">{{ __('Cuota') }}</label>
                            <input type="text" name ="cuota" id="cuota" class="form-control @error('cuota') is-invalid @enderror">
                            @error('cuota')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-md-6">
                            <label for ="fechaMinistracion">{{ __('Fecha de Ministracion') }}</label>
                            <input type="date" name ="fechaMinistracion" id="fechaMinistracion" class="form-control @error('fechaMinistracion') is-invalid @enderror">
                            @error('fechaMinistracion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for ="fechaVencimiento">{{ __('Fecha de vencimiento') }}</label>
                            <input type="date" name ="fechaVencimiento" id="fechaVencimiento" class="form-control @error('fechaVencimiento') is-invalid @enderror">
                            @error('fechaVencimiento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">{{ __('Create') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var noCuotas;
    var quantity;
    var pago;
    $('#noPagos').change(function(){
        noCuotas = $(this).val();
        var date = $("#fechaMinistracion").val();
        var realDate = moment(date, 'YYYY-MM-DD').businessAdd(noCuotas)._d
        $("#fechaVencimiento").val(moment(realDate).format("YYYY-MM-DD"));
    });
    $("#fechaMinistracion").change(function(){
        var date = $("#fechaMinistracion").val();
        var realDate = moment(date, 'YYYY-MM-DD').businessAdd(noCuotas)._d
        $("#fechaVencimiento").val(moment(realDate).format("YYYY-MM-DD"));
    });
</script>
@endsection

