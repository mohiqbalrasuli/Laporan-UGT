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
        Schema::table('table_pjgt', function (Blueprint $table) {
            $table->dropColumn('nama');
        });

        Schema::table('table_gt', function (Blueprint $table) {
            $table->dropColumn('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('table_pjgt', function (Blueprint $table) {
            $table->string('nama')->nullable();
        });

        Schema::table('table_gt', function (Blueprint $table) {
            $table->string('nama')->nullable();
        });
    }
};
