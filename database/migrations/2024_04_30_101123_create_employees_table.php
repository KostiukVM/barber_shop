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
        if (!Schema::hasTable('employees')) {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('position');
                $table->unsignedBigInteger('working_schedule');
                $table->timestamps();

                // Додаємо зовнішні ключі
                $table->foreign('position')->references('id')->on('positions')->onDelete('cascade');
                $table->foreign('working_schedule')->references('id')->on('working_schedules')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
