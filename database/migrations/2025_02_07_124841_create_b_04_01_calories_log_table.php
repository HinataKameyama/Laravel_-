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
        Schema::create('b_04_01_calories_log', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->string('result'); // 合計カロリー
            $table->text('comment'); // コメント
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b_04_01_calories_log');
    }
};
