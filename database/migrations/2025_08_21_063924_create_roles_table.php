<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->unique(); // admin, empleado, entrenador, etc
        $table->timestamps();
    });

    // Agregar algunos roles básicos
    DB::table('roles')->insert([
        ['nombre' => 'admin'],
        ['nombre' => 'empleado'],
        ['nombre' => 'entrenador'],
    ]);
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
