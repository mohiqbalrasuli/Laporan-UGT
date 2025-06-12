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
        Schema::create('table_pjgt', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('table_pjgt');
    }
};
