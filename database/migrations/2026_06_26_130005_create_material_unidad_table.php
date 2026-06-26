<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_unidad', function (Blueprint $table) {
            $table->increments('idMaterialUnidad');
            $table->integer('cantidad');
            $table->unsignedInteger('material_fk');
            $table->unsignedInteger('idUnidad');
            $table->unsignedInteger('presupuesto_fk');
            $table->timestamps();

            $table->foreign('material_fk')
                ->references('codigo')
                ->on('materiales');
            $table->foreign('idUnidad')
                ->references('idUnidad')
                ->on('unidades');
            $table->foreign('presupuesto_fk')
                ->references('codigoPresupuesto')
                ->on('presupuestos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_unidad');
    }
};
