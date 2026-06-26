<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->increments('idRequisicion');
            $table->dateTime('fecha');
            $table->string('estado');
            // Relacion Requisicion 0..1 -> 1 Usuario. La clase Usuario esta fuera del
            // alcance de la tabla A, por lo que se modela como columna sin FK constraint.
            $table->unsignedInteger('usuario_fk')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requisiciones');
    }
};
