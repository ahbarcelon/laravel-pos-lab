<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('account_users', function (Blueprint $table): void {
            $table->string('user_id', 12)->primary();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('role', 20);
            $table->string('status', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('account_users');
    }
};
