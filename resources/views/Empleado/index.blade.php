@extends('layouts.app')

@section('content')
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div>
                        <h3>{{ trans('forms.form_create.list') }}</h3>
                    </div>
                    
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert-info">
                                    {{\Illuminate\Support\Facades\Session::get('success')}}
                                </div>
                            @endif

                    <div class="pull-right">
                        <a href="{{route('empleado.create') }}" class="btn btn-success">{{ trans('forms.form_create.new') }}</a>
                    </div>

                    <div class="table-container">
                    <table id="tablaEmpleados" class="table table-bordered table-striped">
                        <thead>
                            <th>{{ trans('forms.form_create.cd_empleado') }}</th>
                            <th>{{ trans('forms.form_create.name') }}</th>
                            <th>{{ trans('forms.form_create.lastname_1') }}</th>
                            <th>{{ trans('forms.form_create.email') }}</th>
                            <th>{{ trans('forms.form_create.action') }}</th>
                        </thead>
                        <tbody>
                        @if($empleados->count())
                            @foreach($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->codigo_empleado }}</td>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->apellido_paterno ." ". $empleado->apellido_materno }}</td>
                                <td>{{ $empleado->correo }}</td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="{{route('empleado.show', $empleado->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal-delete-{{$empleado->id}}">{{ trans('forms.form_create.delete') }}</button>

                                    <!-- Modal -->
                                    <div id="myModal-delete-{{$empleado->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{{ trans('forms.form_create.delete_employee') }}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{ trans('forms.form_create.question') }}{{$empleado->nombre }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('empleado.destroy',$empleado->id) }}" method="post">
                                            <input name="_method" type="hidden" value="DELETE">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="delete">
                                                <button class="button btn-danger" type="submit">{{ trans('forms.form_create.delete') }}</button>
                                            </form>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('forms.form_create.close') }}</button>
                                        </div>
                                        </div>

                                    </div>
                                    </div>
                                
                                    <a class="btn btn-warning btn-md" href="{{route('empleado.edit', $empleado->id)}}" >{{ trans('forms.form_create.edit') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No se encontro registros</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




@endsection