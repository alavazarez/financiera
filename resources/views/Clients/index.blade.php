@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">Clientes</h3>
                    </div>
                    <div class ="d-flex justify-content-between">
                        <form action="{{ route('clients.import.excel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file">
                            <button class="btn btn-primary" style="margin: 5px">Importar clientes</button>
                            <a href="{{ route('clients.create') }}" class ="btn btn-primary" style="margin: 5px">
                                {{ __('New Client')}}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Phone') }}</th>
                            <th scope="col">{{ __('Address') }}</th>
                            <th scope="col" style="width: 150px">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                        <tr>
                            <td scope ="row">{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->address }}</td>
                            <td>
                                <a href="{{ route('clients.edit', ['id' => $client->id]) }}" class="btn btn-outline-secondary btn-sm">
                                Edit
                                </a>
                                <button class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $client->id }}">Delete</button>
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
                    axios.delete('{{ route('clients.index') }}/' + id)
                    .then(result => {
                        Swal.fire({
                        title: 'Borrado',
                        text: 'El cliente a sido borrado',
                        icon: 'success'
                        }).then(() => {
                            window.location.href='{{ route('clients.index') }}';
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