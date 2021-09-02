<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaPqrAnexos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pqr_anexos', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->unsignedBigInteger('pqr_id');
            $table->foreign('pqr_id', 'fk_pqr_anexos')->references('id')->on('pqr')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('empleado_id')->nullable();
            $table->foreign('empleado_id', 'fk_empleado_pqr_anexo')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('tareas_id')->nullable();
            $table->foreign('tareas_id', 'fk_tarea_asignancion_pqr_anexo')->references('id')->on('tareas')->onDelete('restrict')->onUpdate('restrict');
            $table->string('titulo', 255);
            $table->longText('descripcion')->nullable();
            $table->string('url', 255);
            $table->string('extension', 255);
            $table->double('peso');
            $table->boolean('estado')->default(1)->nullable();
            $table->timestamps();
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pqr_anexos');
    }
}