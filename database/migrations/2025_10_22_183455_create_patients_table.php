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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('id_number',50)->unique();
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->enum('id_type', ['TAJ', 'PASSPORT', 'PERSONAL_ID'])->default('TAJ');
            $table->string('email',150)->nullable();
            $table->string('phone',50)->nullable();
            $table->date('birth_date');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
