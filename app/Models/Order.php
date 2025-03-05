<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // テーブル名を明示的に指定 
    protected $table = 'app6_orders';

    // データベースに保存するフィールドを指定
    protected $fillable = ['name', 'people_count', 'dish', 'remarks'];
}
