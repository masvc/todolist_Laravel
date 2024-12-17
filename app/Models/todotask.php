<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class todotask extends Model
{
    /** @use HasFactory<\Database\Factories\TodotaskFactory> */
    use HasFactory;

    // 使用するテーブル名を指定
    protected $table = 'todotasks';

    // マスアサインメントを許可する属性
    protected $fillable = ['task', 'done', 'img'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
