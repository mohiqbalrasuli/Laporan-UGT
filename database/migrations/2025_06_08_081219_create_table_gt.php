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
        Schema::create('table_gt', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('alamat')->nullable();
            $table->string('asal_kelas')->nullable();
            $table->string('status_tugas')->nullable();
            $table->unsignedBigInteger('madrasah_id')->nullable();
            $table->foreign('madrasah_id')
                  ->references('id')->on('table_madrasah')
                  ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_gt');
    }
};
