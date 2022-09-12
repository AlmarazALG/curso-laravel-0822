<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('apellido_paterno',30);
            $table->string('apellido_materno',30);
            $table->string('correo',50);
            $table->date('fecha_nacimiento')->nullable;
            $table->string('direccion',100)->nullable;
            $table->enum('genero',['hombre', 'mujer']);
            $table->string('telefono',15);
            $table->integer('codigo_empleado')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
