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
    Schema::create('propiedades', function (Blueprint $table) {
        $table->id();

        // 🏷️ Básico
        $table->string('titulo');
        $table->text('descripcion')->nullable();
        $table->text('descripcion_breve')->nullable();
        $table->decimal('precio', 12, 2)->nullable();

        // 📐 Características
        $table->integer('habitaciones')->nullable();
        $table->integer('ambientes')->nullable();
        $table->integer('banios')->nullable();
        $table->text('banios_extra')->nullable();


        $table->integer('superficie_total')->nullable();
        $table->integer('superficie_cubierta')->nullable();

        // 📍 Ubicación
        $table->string('direccion')->nullable();
        $table->string('ciudad')->nullable();
        $table->string('barrio')->nullable();

        // 🏡 Extras
        $table->boolean('tiene_jardin')->default(false);
        $table->boolean('tiene_cochera')->default(false);

        // ⚡ Servicios (simple por ahora)
        $table->boolean('luz')->default(false);
        $table->boolean('gas')->default(false);
        $table->boolean('calefaccion')->default(false);
        $table->string('calefaccion_extra')->default(false);
        $table->integer('cant_plantas')->default(1);

        // 📝 Extra
        $table->text('observaciones')->nullable();

        // 🔥 PRO (muy recomendado)
        $table->boolean('destacada')->default(false);
        $table->enum('estado', ['disponible', 'reservada', 'vendida'])->default('disponible');

        // 🔗 Relaciones
        $table->foreignId('operacion_id')
            ->constrained('operaciones')
            ->cascadeOnDelete();

        $table->foreignId('tipo_propiedad_id')
            ->constrained('tipo_propiedades')
            ->cascadeOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedads');
    }
};
