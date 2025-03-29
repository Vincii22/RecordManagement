<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('Name', 150);
            $table->string('Username', 100)->unique();
            $table->string('PasswordHash', 255);
            $table->string('ContactNo', 20)->nullable();
            $table->string('Email', 100)->unique();
            $table->date('Birthday');
            $table->enum('Sex', ['Male', 'Female']);
            $table->enum('Position', ['Teacher I', 'Teacher II', 'Teacher III', 'Teacher IV', 'Master Teacher I', 'Master Teacher II']);
            $table->string('ImagePath', 500)->nullable();
            $table->enum('UserType', ['Admin', 'Faculty']);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->timestamp('UpdatedAt')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('UserID')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
