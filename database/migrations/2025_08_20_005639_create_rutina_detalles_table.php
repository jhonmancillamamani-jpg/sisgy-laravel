<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('rutina_detalles', function (Blueprint $table) {
$table->id();
$table->foreignId('rutina_id')->constrained('rutinas')->onDelete('cascade');
$table->string('ejercicio');
$table->unsignedSmallInteger('series')->default(3);
$table->unsignedSmallInteger('repeticiones')->default(10);
$table->decimal('peso', 6, 2)->nullable();
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('rutina_detalles');
}
};