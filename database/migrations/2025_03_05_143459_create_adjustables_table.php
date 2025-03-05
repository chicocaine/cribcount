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
        Schema::create('adjustables', function (Blueprint $table) {
            $table->foreignId('mortgage_id')->constrained()->cascadeOnDelete();
            $table->integer('initial_term');
            $table->decimal('initial_rate', 2, 2);
            $table->decimal('margin', 2, 2);
            $table->decimal('periodic_cap', 2, 2);
            $table->decimal('lifetime_cap', 2, 2);
            $table->integer('interest_only_period')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('mortgage_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjustables');
    }
};
