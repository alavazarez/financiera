@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Pagos</h3>
                    </div>
                    <div>
                        <a href="{{ route('pagos.excel') }}" class ="btn btn-primary">
                            {{ __('Descargar')}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Prestamo') }}</th>
                            <th scope="col">{{ __('Cuota') }}</th>
                            <th scope="col">{{ __('No. de Pagos') }}</th>
                            <th scope="col">{{ __('Pagos realizados') }}</th>
                            <th scope="col">{{ __('Saldo abonado') }}</th>
                            <th scope="col">{{ __('Saldo Pendiente') }}</th>
                            <th scope="col" style="width: 100px">{{ __('Actions') }}</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($prestamos as $prestamo)
                        <tr>
                            <td scope ="row">{{ $prestamo->id }}</td>
                            <td>{{ $prestamo->client->name }}</td>
                            <td>{{ ($prestamo->PrestamoAbonado + $prestamo->PrestamoRestante) }}</td>
                            <td>{{ $prestamo->cuota }}</td>
                            <td>{{ $prestamo->noPagos }}</td>
                            <td>{{ $prestamo->PagosRealizados }}</td>
                            <td>{{ $prestamo->PrestamoAbonado }}</td>
                            <td>{{ $prestamo->PrestamoRestante }}</td>
                            <td>
                                <a href="{{ route('pagos.show', ['id' => $prestamo->id]) }}" class="btn btn-outline-secondary btn-sm">
                                Mostrar
                                </a>
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
