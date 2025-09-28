<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('people')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('date');
            $table->enum('status', ['Presente', 'Falta', 'Tardanza', 'Permiso']);
            $table->timestamps();
            $table->unique(['person_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
