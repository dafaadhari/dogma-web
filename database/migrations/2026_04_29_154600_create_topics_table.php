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
    Schema::create('topics', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Judul diskusi
        $table->string('slug')->unique(); // URL friendly
        $table->text('description'); // Ringkasan pembahasan
        $table->dateTime('discussion_date'); // Waktu pelaksanaan
        $table->enum('status', ['upcoming', 'completed'])->default('upcoming'); // Status diskusi
        $table->string('image_path')->nullable(); // Opsional jika ada poster acara
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
