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
        $table->decimal('precio', 12, 2)->nullable();

        // 📐 Características
        $table->integer('habitaciones')->nullable();
        $table->integer('banios')->nullable();
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
        $table->text('servicios')->nullable();

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
