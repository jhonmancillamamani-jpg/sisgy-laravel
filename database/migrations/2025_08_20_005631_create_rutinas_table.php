<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('rutinas', function (Blueprint $table) {
$table->id();
$table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
$table->string('titulo');
$table->text('descripcion')->nullable();
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('rutinas');
}
};