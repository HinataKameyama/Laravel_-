<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CaloriesLog extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定
    protected $table = 'b_04_01_calories_log';

    // データベースに保存するフィールドを指定
    protected $fillable = ['result','comment'];

    /**
     * 合計カロリーとコメントを保存する
     *
     * @param float $totalCalorie 合計カロリー
     * @param string $comment コメント
     * @return \App\Models\CaloriesLog
     */
    public static function saveCaloriesLog($totalCalorie = null, $comment = null)
    {
        // 新しいインスタンスを生成し、データをセット
        $caloriesLog = new self();
        $caloriesLog->result = $totalCalorie ?? null;
        $caloriesLog->comment = $comment ?? null;

        // 保存
        $caloriesLog->save();

        return $caloriesLog;
    }
}
