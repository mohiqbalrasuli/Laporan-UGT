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
        // Tambah gt_id ke tabel pjgt
        Schema::table('table_pjgt', function (Blueprint $table) {
            $table->unsignedBigInteger('gt_id')->nullable()->after('user_id');

            $table->foreign('gt_id')
                  ->references('id')->on('table_gt')
                  ->onDelete('set null');
        });

        // Tambah pjgt_id ke tabel gt
        Schema::table('table_gt', function (Blueprint $table) {
            $table->unsignedBigInteger('pjgt_id')->nullable()->after('madrasah_id');

            $table->foreign('pjgt_id')
                  ->references('id')->on('table_pjgt')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback kolom
        Schema::table('table_pjgt', function (Blueprint $table) {
            $table->dropForeign(['gt_id']);
            $table->dropColumn('gt_id');
        });

        Schema::table('table_gt', function (Blueprint $table) {
            $table->dropForeign(['pjgt_id']);
            $table->dropColumn('pjgt_id');
        });
    }
};
