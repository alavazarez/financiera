@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ __('Modify Loan') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('prestamos.index') }}" class ="btn btn-danger">
                            {{ __('Cancel')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action= "{{ route('prestamos.update',['id'=>$prestamo->id]) }}" method="POST">
                @csrf
                    <div class="form-group form-row">
                        <div class="col-md-8">
                            <label for ="client_id">{{ __('client_id') }}</label>
                            <!-- <select name ="name" id="id" class="form-control">
                                @foreach ($clients as $client)
                                    <option value ="{{ $client['id'] }}">{{ $client['name'] }}</option>
                                @endforeach 
                                </select> -->
                                <input name ="client_id" id="client_id" value="{{ $prestamo->client_id }}" class="form-control"></input>
                        </div>
                        <div class="col-md-4">
                            <label for ="cantidad">{{ __('Cantidad') }}</label>
                            <input type="text" name ="cantidad" id="cantidad" value="{{ $prestamo->cantidad }}" class="form-control @error('cantidad') is-invalid @enderror">
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
                            <input type="text" name ="noPagos" id="noPagos" value="{{ $prestamo->noPagos }}" class="form-control @error('noPagos') is-invalid @enderror">
                            @error('noPagos')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for ="cuota">{{ __('Cuota') }}</label>
                            <input type="text" name ="cuota" id="cuota" value="{{ $prestamo->cuota }}" class="form-control @error('cuota') is-invalid @enderror">
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
                            <input type="datetime" name ="fechaMinistracion" id="fechaMinistracion" value="{{ $prestamo->fechaMinistracion }}" readonly="readonly" class="form-control @error('fechaMinistracion') is-invalid @enderror">
                            @error('fechaMinistracion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for ="fechaVencimiento">{{ __('Fecha de vencimiento') }}</label>
                            <input type="text" name ="fechaVencimiento" id="fechaVencimiento" value="{{ $prestamo->fechaVencimiento }}" readonly="readonly" class="form-control @error('fechaVencimiento') is-invalid @enderror">
                            @error('fechaVencimiento')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">{{ __('Modify') }}</button>
                    </div>    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection