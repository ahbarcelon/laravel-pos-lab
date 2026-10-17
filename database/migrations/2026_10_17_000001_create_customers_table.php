<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table): void {
            $table->string('customer_id', 12)->primary();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('contact_number', 30);
            $table->string('address');
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
