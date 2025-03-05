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
}
