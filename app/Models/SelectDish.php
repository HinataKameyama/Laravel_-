<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SelectDish extends Model
{
    use HasFactory;

    // テーブル名を明示的に指定
    protected $table = 'b_04_01_dishes';
    
}

