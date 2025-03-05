<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApp6OrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app6_orders', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->string('name'); // 予約者名
            $table->integer('people_count'); // 人数
            $table->string('dish'); // 料理名
            $table->text('remarks')->nullable(); // 備考（改行を許容）
            $table->timestamps(); // 作成日時と更新日時
            $table->comment('注文フォームのデータを格納');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app6_orders');
    }
}