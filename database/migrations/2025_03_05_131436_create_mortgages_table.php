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
        Schema::create('mortgages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->decimal('home_price', 15, 4);
            $table->decimal('down_payment', 15, 4);
            $table->string('loan_type');
            $table->decimal('interest_rate', 5, 2);
            $table->integer('loan_term');
            $table->decimal('monthly_property_tax', 15, 4)->nullable();
            $table->decimal('monthly_home_insurance', 15, 4)->nullable();
            $table->decimal('monthly_hoa', 15, 4)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mortgages');
    }
};
