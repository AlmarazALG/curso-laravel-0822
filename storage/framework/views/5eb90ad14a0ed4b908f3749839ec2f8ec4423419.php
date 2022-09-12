<?php $__env->startSection('content'); ?>
<div class="row">
    <section class="content">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div>
                        <h3><?php echo e(trans('forms.form_create.list')); ?></h3>
                    </div>
                    
                    <?php if(\Illuminate\Support\Facades\Session::has('success')): ?>
                                <div class="alert-info">
                                    <?php echo e(\Illuminate\Support\Facades\Session::get('success')); ?>

                                </div>
                            <?php endif; ?>

                    <div class="pull-right">
                        <a href="<?php echo e(route('empleado.create')); ?>" class="btn btn-success"><?php echo e(trans('forms.form_create.new')); ?></a>
                    </div>

                    <div class="table-container">
                    <table id="tablaEmpleados" class="table table-bordered table-striped">
                        <thead>
                            <th><?php echo e(trans('forms.form_create.cd_empleado')); ?></th>
                            <th><?php echo e(trans('forms.form_create.name')); ?></th>
                            <th><?php echo e(trans('forms.form_create.lastname_1')); ?></th>
                            <th><?php echo e(trans('forms.form_create.email')); ?></th>
                            <th><?php echo e(trans('forms.form_create.action')); ?></th>
                        </thead>
                        <tbody>
                        <?php if($empleados->count()): ?>
                            <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($empleado->codigo_empleado); ?></td>
                                <td><?php echo e($empleado->nombre); ?></td>
                                <td><?php echo e($empleado->apellido_paterno ." ". $empleado->apellido_materno); ?></td>
                                <td><?php echo e($empleado->correo); ?></td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="<?php echo e(route('empleado.show', $empleado->id)); ?>" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                    
                                    <button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal-delete-<?php echo e($empleado->id); ?>"><?php echo e(trans('forms.form_create.delete')); ?></button>

                                    <!-- Modal -->
                                    <div id="myModal-delete-<?php echo e($empleado->id); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><?php echo e(trans('forms.form_create.delete_employee')); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><?php echo e(trans('forms.form_create.question')); ?><?php echo e($empleado->nombre); ?>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="<?php echo e(route('empleado.destroy',$empleado->id)); ?>" method="post">
                                            <input name="_method" type="hidden" value="DELETE">
                                                <?php echo e(csrf_field()); ?>

                                                <input name="_method" type="hidden" value="delete">
                                                <button class="button btn-danger" type="submit"><?php echo e(trans('forms.form_create.delete')); ?></button>
                                            </form>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('forms.form_create.close')); ?></button>
                                        </div>
                                        </div>

                                    </div>
                                    </div>
                                
                                    <a class="btn btn-warning btn-md" href="<?php echo e(route('empleado.edit', $empleado->id)); ?>" ><?php echo e(trans('forms.form_create.edit')); ?></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No se encontro registros</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>