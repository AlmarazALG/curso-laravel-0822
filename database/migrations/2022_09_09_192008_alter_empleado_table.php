<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado', function (Blueprint $table) {
            $table->decimal('salario',8,2)->after('telefono');
            $table->char('tipo_moneda')->after('salario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado', function (Blueprint $table) {
                //Eliminamos columna salario y tipo_moneda
                $table->dropColumn('salario');
                $table->dropColumn('tipo_moneda');

        });
    }
}