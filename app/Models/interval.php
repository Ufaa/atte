<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interval extends Model
{
    protected $fillable = ['user_id', 'start_time', 'end_time','date','attendance_id']; //保存したいカラム名が複数の場合
    
    //Userモデルとのリレーション　1対多　1人のユーザーは何度でも休憩できる
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
