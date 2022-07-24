<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WbsComment extends Model
{
    use HasFactory;
    // table
    protected $table = 'wbs_comment';
    // 主キーカラム名を指定
    protected $primaryKey = 'wbsId';
    // オートインクリメント無効化
    public $incrementing = false;
    // Laravel 6.0+以降なら指定
    protected $keyType = 'integer';
}
