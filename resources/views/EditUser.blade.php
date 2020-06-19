@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="mb-0">{{ __('Modificar usuario') }}</h3>
                            </div>
                            <div>
                                <a href="{{ route('home') }}" class ="btn btn-danger">
                                {{ __('Cancel')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action= "{{ route('users.update',['id'=>$usuario->id]) }}" method="POST">
                        @csrf
                            <div class="form-group form-row">
                                <div class="col-md-6">
                                    <label for ="name">{{ __('Name') }}</label>
                                    <input type="text" name ="name" id="name" value="{{ $usuario->name }}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            
                                <div class="col-md-6">
                                    <label for ="email">{{ __('Correo electronico') }}</label>
                                    <input type="text" name ="email" id="email" value="{{ $usuario->email }}" class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
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

            <br>
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="mb-0">{{ __('Actualizar contraseña') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action= "{{ route('users.password',['id'=>$usuario->id]) }}" method="POST">
                        @csrf
                            <div class="form-group form-row">
                                <div class="col-md-4">
                                    <label for ="passwordActual">{{ __('Contraseña actual') }}</label>
                                    <input type="password" name ="passwordActual" id="passwordActual" class="form-control @error('passwordActual') is-invalid @enderror">
                                    @error('passwordActual')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for ="passwordNew">{{ __('Nueva contraseña') }}</label>
                                    <input type="password" name ="passwordNew" id="passwordNew" class="form-control @error('passwordNew') is-invalid @enderror">
                                    @error('passwordNew')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for ="passwordConfirm">{{ __('Confirmar contraseña') }}</label>
                                    <input type="password" name ="passwordConfirm" id="passwordConfirm" class="form-control @error('passwordConfirm') is-invalid @enderror">
                                    @error('passwordConfirm')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">{{ __('Actualizar') }}</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
