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
        Schema::create('alumni_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained()->onDelete('cascade');
            $table->string('document_name');
            $table->string('file_path'); // Path where document is stored
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_documents');
    }
};
