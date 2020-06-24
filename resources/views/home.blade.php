@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session('flash'))
            <div class="alert alert-danger" role="alert">
                <strong>AVISO: ¡Imposible Modificar!     </strong>{{Session('flash')}}  
            </div>
            @endif
            <div class="card-deck">
            
                <div class ="card">
                    <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            BIENVENIDO!
                        </div>
                </div>
                <div class="card">
                    <div class="card-header">Numero de Clientes</div>
                    <div class="card-body">
                    {{$clientcount}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
