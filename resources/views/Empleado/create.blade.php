@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
            
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>{{ trans('forms.form_create.create') }}</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('empleado.store') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.name') }}</label>
                                        <input type="text" id="nombre" name="nombre" placeholder="nombre" value="{{old('nombre') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>{{ trans('forms.form_create.lastname_1') }}</label>
                                        <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido paterno" value="{{old('apellido_paterno') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>{{ trans('forms.form_create.lastname_2') }}</label>
                                        <input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido materno" value="{{old('apellido_materno') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>{{ trans('forms.form_create.birthdate') }}</label>
                                        <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha de nacimiento" value="{{old('fecha_nacimiento') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.gender') }}</label>
                                        
                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero"value="hombre">Hombre</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" id="genero" name="genero"value="mujer">Mujer</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>{{ trans('forms.form_create.email') }}</label>
                                        <input type="email" id="correo" name="correo" placeholder="correo" value="{{old('correo') }}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>{{ trans('forms.form_create.direction') }}</label>
                                        <input type="direccion" id="direccion" name="direccion" placeholder="direccion" value="{{old('direccion') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>{{ trans('forms.form_create.telephone') }}</label>
                                        <input type="telefono" id="telefono" name="telefono" placeholder="telefono" value="{{old('telefono') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label>{{ trans('forms.form_create.cd_empleado') }}</label>
                                        <input type="codigo_empleado" id="codigo_empleado" name="codigo_empleado" placeholder="codigo_empleado" value="{{old('codigo_empleado') }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.salary') }} </label>
                                        <input type="number" name="salario" id="salario" placeholder="Salario del empleado" value="{{ old('salario') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.currency') }} </label>
                                        <select id="tipo_moneda" name="tipo_moneda">
                                            <option value="">Tipo de Moneda</option>
                                            @foreach($listMonedas as $moneda)
                                                <option value="{{$moneda}}">{{$moneda}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="row">
                                <button type="submit" class="btn btn-success">{{ trans('forms.form_create.save') }}</button>
                                <a href="{{route('empleado.index') }}" class="btn btn-default">{{ trans('forms.form_create.back') }}</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection