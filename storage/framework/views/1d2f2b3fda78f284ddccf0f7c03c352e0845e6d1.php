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
                    <h3><?php echo e(trans('forms.form_create.edit_employee')); ?></h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route('empleado.update',$empleado->id)); ?>">

                        <input name="_method" type="hidden" value="PUT">
                        <?php echo e(csrf_field()); ?>

                        

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('forms.form_create.name')); ?></label>
                                    <input type="text" id="nombre" name="nombre" placeholder="nombre" value="<?php echo e($empleado->nombre); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><?php echo e(trans('forms.form_create.lastname_1')); ?></label>
                                    <input type="text" id="apellido_paterno" name="apellido_paterno" placeholder="apellido paterno" value="<?php echo e($empleado->apellido_paterno); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><?php echo e(trans('forms.form_create.lastname_2')); ?></label>
                                    <input type="text" id="apellido_materno" name="apellido_materno" placeholder="apellido materno" value="<?php echo e($empleado->apellido_materno); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><?php echo e(trans('forms.form_create.birthdate')); ?></label>
                                    <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="fecha de nacimiento" value="<?php echo e($empleado->fecha_nacimiento); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><?php echo e(trans('forms.form_create.gender')); ?></label>
                                    
                                    <div class="radio">
                                        <label><input type="radio" id="genero" name="genero"value="hombre" <?php echo e($empleado->genero == 'hombre' ? 'checked="true"' : ''); ?>>Hombre</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" id="genero" name="genero"value="mujer" <?php echo e($empleado->genero == 'mujer' ? 'checked="true"' : ''); ?>>Mujer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><?php echo e(trans('forms.form_create.email')); ?></label>
                                    <input type="email" id="correo" name="correo" placeholder="correo" value="<?php echo e($empleado->correo); ?>">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><?php echo e(trans('forms.form_create.direction')); ?></label>
                                    <input type="direccion" id="direccion" name="direccion" placeholder="direccion" value="<?php echo e($empleado->fecha_nacimiento); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><?php echo e(trans('forms.form_create.telephone')); ?></label>
                                    <input type="telefono" id="telefono" name="telefono" placeholder="telefono" value="<?php echo e($empleado->telefono); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label><?php echo e(trans('forms.form_create.cd_empleado')); ?></label>
                                    <input type="codigo_empleado" id="codigo_empleado" name="codigo_empleado" placeholder="codigo_empleado" value="<?php echo e($empleado->codigo_empleado); ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.salary')); ?> </label>
                                    <input type="number" name="salario" id="salario" placeholder="Salario del empleado" value="<?php echo e(old('salario', $empleado->salario)); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> <?php echo e(trans('forms.form_create.currency')); ?> </label>
                                    <select id="tipo_moneda" name="tipo_moneda">
                                        <option value="<?php echo e(old('tipo_moneda',$empleado->tipo_moneda)); ?>"> <?php echo e(old('tipo_moneda',$empleado->tipo_moneda)); ?></option>
                                        <?php $__currentLoopData = $listMonedas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $moneda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($moneda); ?>"><?php echo e($moneda); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success"><?php echo e(trans('forms.form_create.save')); ?></button>
                            <a href="<?php echo e(route('empleado.index')); ?>" class="btn btn-default"><?php echo e(trans('forms.form_create.back')); ?></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>