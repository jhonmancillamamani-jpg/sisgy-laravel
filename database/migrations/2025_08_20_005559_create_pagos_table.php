<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
public function up(): void
{
Schema::create('pagos', function (Blueprint $table) {
$table->id();
$table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
$table->string('concepto');
$table->decimal('monto', 10, 2);
$table->date('fecha');
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('pagos');
}
};
