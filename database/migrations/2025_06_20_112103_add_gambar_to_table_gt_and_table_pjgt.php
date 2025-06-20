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
        Schema::table('table_gt', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('id');
        });
        Schema::table('table_pjgt', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_gt', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
        Schema::table('table_pjgt', function (Blueprint $table) {
            $table->dropColumn('gambar');
        });
    }
};
