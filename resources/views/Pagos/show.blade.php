@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Detalles Pagos</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cliente: {{ $prestamos->client->name }}</h5>
                            <h5 class="card-title">Total abonado: {{ $prestamos->PrestamoAbonado }}</h5>
                            <h5 class="card-title">Saldo Pendiente: {{ $prestamos->PrestamoRestante }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <h3 class="text-center">Cantidad a Abonar</h3>
                        <div class="card-body text-center">
                            <form action="{{ route('pagos.abonar', ['id'=>$prestamos->id]) }}" method="POST">
                            @csrf
                                <div>
                                    Cantidad:
                                    <input type="text" name ="abonar" id="abonar">
                                    <button type="submit" class ="btn btn-primary">
                                        {{ __('Abonar')}}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"># de pago</th>
                            <th scope="col">{{ __('Cuota') }}</th>
                            <th scope="col">{{ __('Abonado') }}</th>
                            <th scope="col">{{ __('Fecha de Pago') }}</th>
                            <th scope="col">{{ __('Feha de abono') }}</th>                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prestamos->pagos as $pago)
                            <tr>
                                <td>{{ $pago->number }}</td>
                                <td>{{ $pago->cantidad }}</td>
                                <td>{{ $pago->abono }}</td>
                                <td>{{ $pago->fechaPago }}</td>
                                <td>{{ $pago->fechaAbono }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
