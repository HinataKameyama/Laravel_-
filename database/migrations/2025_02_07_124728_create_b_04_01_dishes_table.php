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
        Schema::create('b_04_01_dishes', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->string('category'); // カテゴリ
            $table->text('name'); // 料理名
            $table->string('calories'); // カロリー
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_04_01_dishes');
    }
};
