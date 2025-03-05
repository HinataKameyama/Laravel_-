<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定
    protected $table = 'app7_notes';

    // データベースに保存するフィールドを指定
    protected $fillable = ['title', 'detail'];
}