<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bbs extends Model
{
    use HasFactory;
    // 論理削除する場合は use SoftDeletes;を追加
    use SoftDeletes;

    protected $fillable = [
        'name',
        'body'
    ];
}
