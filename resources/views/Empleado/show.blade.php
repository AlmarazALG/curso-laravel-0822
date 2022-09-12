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
                        <h3> Datos de empleado</h3>
                    </div>

                    <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('forms.form_create.cd_empleado') }}: {{$empleado->codigo_empleado}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('forms.form_create.name') }}: {{ $empleado->nombre }} </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('forms.form_create.lastname_1') }}: {{$empleado->apellido_paterno}} </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('forms.form_create.lastname_2') }}: {{$empleado->apellido_materno}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('forms.form_create.birthdate') }}: {{$empleado->fecha_nacimiento }}</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('forms.form_create.gender') }}: {{$empleado->genero}} </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> {{ trans('forms.form_create.address') }}: {{$empleado->direccion}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('forms.form_create.email') }}: {{$empleado->correo}}</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('forms.form_create.phone') }}: {{$empleado->telefono}}</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('forms.form_create.salary') }}: {{$empleado->salario}}  {{$empleado->tipo_moneda}}</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('forms.form_create.currency') }}: {{$empleado->tipo_moneda}}</label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="table-container">
                            <div class="center-block"><h4><b>Datos de contacto</b></h4></div>
                            <div class=" form-group pull-right">
                                <a href="{{ route('datoContacto.create',['empleado' => $empleado->id]) }}" class="btn btn-success">Agregar contacto</a>
                            </div>

                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert-info">
                                    {{\Illuminate\Support\Facades\Session::get('success')}}
                                </div>
                            @endif
                            <div class="row">
                                <table id="tablaEmpleados" class="table table-bordered table-striped">
                                    <thead>
                                    <th>Nombre contacto</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Estado</th>
                                    <th>CP</th>
                                    <th>Acciones</th>
                                    </thead>

                                    <tbody>
                                    @if($empleado->datosContacto->count())
                                        @foreach($empleado->datosContacto as $dc)
                                            @if($dc->eliminado == 0)
                                            <tr>
                                                <td>{{ $dc->nombre_contacto }}</td>
                                                <td>{{ $dc->email }}</td>
                                                <td>{{ $dc->telefono}}</td>
                                                <td>{{ $dc->direccion }}</td>
                                                <td>{{ $dc->ciudad }}</td>
                                                <td>
                                                    @foreach($estadosList as $estado)
                                                    {{ $dc->estado == $estado->id_estado ? $estado->nombre : '' }}
                                                    @endforeach
                                                </td>
                                                <td>{{ $dc->cp }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{$dc->id}}">Eliminar</button>
                                                    <!-- Modal Confirm Delete-->
                                                    <div class="modal fade" id="modal-delete-{{$dc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="{{route('datoContacto.destroy', [$dc->id,$empleado->id])}}" method="post">
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                {{csrf_field()}}
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        ¿ Desea eliminar al registro <b> {{$dc->nombre_contacto}} </b>?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Final Modal-->
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5"> No hay Registros</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-1">
                                <a href="{{ route('empleado.index') }}" class="btn btn-default btn-lg">Atras</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection