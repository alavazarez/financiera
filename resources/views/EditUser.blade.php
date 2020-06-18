@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="mb-0">{{ __('Modificar usuario') }}</h3>
                            </div>
                            <div>
                                <a href="{{ route('home') }}" class ="btn btn-danger">{{ __('Cancel')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action= "{{ route('users.update',['id'=>$usuario->id]) }}" method="POST">
                            @csrf
                                <div class="form-group form-row">
                                    <div class="col-md-5">
                                        <label for ="name">{{ __('Name') }}</label>
                                        <input type="text" name ="name" id="name" value="{{ $usuario->name }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-7">
                                        <label for ="email">{{ __('Correo electronico') }}</label>
                                        <input type="text" name ="email" id="email" value="{{ $usuario->email }}" class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <div class="col-md-6">
                                        <label for ="passwordActual">{{ __('Contraseña actual') }}</label>
                                        <input type="text" name ="passwordActual" id="passwordActual" class="form-control @error('passwordActual') is-invalid @enderror">
                                        @error('passwordActual')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for ="passwordNew">{{ __('Contraseña nueva') }}</label>
                                        <input type="text" name ="passwordNew" id="passwordNew" class="form-control @error('passwordNew') is-invalid @enderror">
                                        @error('passwordNew')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">{{ __('Modificar') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
