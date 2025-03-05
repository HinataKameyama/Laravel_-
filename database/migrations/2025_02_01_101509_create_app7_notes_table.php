<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApp7NotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app7_notes', function (Blueprint $table) {
            $table->id(); // 自動インクリメントID
            $table->string('title'); // メモのタイトル
            $table->text('detail'); // メモの詳細（改行を許容）
            $table->timestamps(); // 作成日時と更新日時
            $table->comment('メモアプリのメモデータを格納');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app7_notes');
    }
}