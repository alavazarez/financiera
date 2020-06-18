@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Prestamos</h3>
                    </div>
                    
                    <div>
                        <a href="{{ route('prestamos.create') }}" class ="btn btn-primary">
                            {{ __('New loan')}}
                        </a>
                    </div>
                </div>
            </div>
            @if(Session('flash'))
            <div class="alert alert-danger" role="alert">
                <strong>AVISO: ¡Imposible Modificar!     </strong>{{Session('flash')}}  
            </div>
            @endif
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Cantidad prestada') }}</th>
                            <th scope="col">{{ __('No. de pagos') }}</th>
                            <th scope="col">{{ __('Cuota') }}</th>
                            <th scope="col">{{ __('Total a pagar') }}</th>
                            <th scope="col">{{ __('Fecha de ministracion') }}</th>
                            <th scope="col">{{ __('Fecha de vencimiento') }}</th>
                            <th scope="col" style="width: 150px">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prestamos as $prestamo)
                        <tr>
                            <td scope ="row">{{ $prestamo->id }}</td>
                            <td>{{ $prestamo->client->name }}</td>
                            <td>{{ $prestamo->cantidad }}</td>
                            <td>{{ $prestamo->noPagos }}</td>
                            <td>{{ $prestamo->cuota }}</td>
                            <td>{{ $prestamo->totalPagar }}</td>
                            <td>{{ $prestamo->fechaMinistracion }}</td>
                            <td>{{ $prestamo->fechaVencimiento }}</td>
                            <td>
                                <a href="{{ route('prestamos.edit', ['id' => $prestamo->id]) }}" class="btn btn-outline-secondary btn-sm">
                                Edit
                                </a>
                                <button class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $prestamo->id }}">Delete</button>
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

@section('bottom-js')
    <script>    
        
        $('body').on('click', '.btn-delete', function(event) {
            const id = $(this).data('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás revertir esta acción',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borralo!'
            })
            .then((result) => {
                if (result.value) {
                    axios.delete('{{ route('prestamos.index') }}/' + id)
                    .then(result => {
                        Swal.fire({
                        title: 'Borrado',
                        text: 'El cliente a sido borrado',
                        icon: 'success'
                        }).then(() => {
                            window.location.href='{{ route('prestamos.index') }}';
                        });
                    })
                    .catch(error => {
                        Swal.fire(
                        'Ocurrio un error',
                        'El cliente no ha podido borrarse',
                        'error'
                        );
                    })
                }
            });
        });
    </script>
@endsection