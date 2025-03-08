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
        Schema::table('b_04_01_dishes', function (Blueprint $table) {
            $table->renameColumn('category', 'category_id'); // category → category_id に変更
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('b_04_01_dishes', function (Blueprint $table) {
            $table->renameColumn('category_id', 'category'); // 元に戻す処理
        });
    }
};
