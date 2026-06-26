<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('unidadMedida');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->unsignedInteger('categoria_fk');
            $table->timestamps();

            $table->foreign('categoria_fk')
                ->references('idCategoria')
                ->on('categorias');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
