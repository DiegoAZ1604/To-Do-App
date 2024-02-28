<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //migration for table tarea
        Schema::create('tarea', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('descripcion')->default('');
            date_default_timezone_set('America/New_York'); // Establecer la zona horaria local
            $table->date('fecha_inicio')->default(date('Y-m-d H:i:s')); // Obtener la hora actual en la zona horaria local
            $table->date('fecha_fin')->nullable();
            $table->integer('prioridad')->default(0); //0 = baja, 1 = media, 2 = alta   
            $table->string('categoria')->default('');
            $table->string('estado');
            $table->unsignedBigInteger('id_proyecto')->nullable();
            $table->foreign('id_proyecto')->references('id')->on('proyecto')->onDelete('cascade');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
