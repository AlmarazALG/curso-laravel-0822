<?php $__env->startSection('content'); ?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3> Datos de empleado</h3>
                    </div>

                    <div class="panel-body">
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('forms.form_create.cd_empleado')); ?>: <?php echo e($empleado->codigo_empleado); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.name')); ?>: <?php echo e($empleado->nombre); ?> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.lastname_1')); ?>: <?php echo e($empleado->apellido_paterno); ?> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.lastname_2')); ?>: <?php echo e($empleado->apellido_materno); ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.birthdate')); ?>: <?php echo e($empleado->fecha_nacimiento); ?></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.gender')); ?>: <?php echo e($empleado->genero); ?> </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.address')); ?>: <?php echo e($empleado->direccion); ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('forms.form_create.email')); ?>: <?php echo e($empleado->correo); ?></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('forms.form_create.phone')); ?>: <?php echo e($empleado->telefono); ?></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('forms.form_create.salary')); ?>: <?php echo e($empleado->salario); ?>  <?php echo e($empleado->tipo_moneda); ?></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('forms.form_create.currency')); ?>: <?php echo e($empleado->tipo_moneda); ?></label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="table-container">
                            <div class="center-block"><h4><b>Datos de contacto</b></h4></div>
                            <div class=" form-group pull-right">
                                <a href="<?php echo e(route('datoContacto.create',['empleado' => $empleado->id])); ?>" class="btn btn-success">Agregar contacto</a>
                            </div>

                            <?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
                                <div class="alert-info">
                                    <?php echo e(\Illuminate\Support\Facades\Session::get('success')); ?>

                                </div>
                            <?php endif; ?>
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
                                    <?php if($empleado->datosContacto->count()): ?>
                                        <?php $__currentLoopData = $empleado->datosContacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($dc->eliminado == 0): ?>
                                            <tr>
                                                <td><?php echo e($dc->nombre_contacto); ?></td>
                                                <td><?php echo e($dc->email); ?></td>
                                                <td><?php echo e($dc->telefono); ?></td>
                                                <td><?php echo e($dc->direccion); ?></td>
                                                <td><?php echo e($dc->ciudad); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $estadosList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($dc->estado == $estado->id_estado ? $estado->nombre : ''); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                                <td><?php echo e($dc->cp); ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-<?php echo e($dc->id); ?>">Eliminar</button>
                                                    <!-- Modal Confirm Delete-->
                                                    <div class="modal fade" id="modal-delete-<?php echo e($dc->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <form action="<?php echo e(route('datoContacto.destroy', [$dc->id,$empleado->id])); ?>" method="post">
                                                                <input name="_method" type="hidden" value="DELETE">
                                                                <?php echo e(csrf_field()); ?>

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        ¿ Desea eliminar al registro <b> <?php echo e($dc->nombre_contacto); ?> </b>?
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
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5"> No hay Registros</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-1">
                                <a href="<?php echo e(route('empleado.index')); ?>" class="btn btn-default btn-lg">Atras</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>