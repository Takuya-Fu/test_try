<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 引数で受け取ったログインしているユーザーを除いたユーザーを１ページにつき5名取得して表示する
    public function getAllUsers(Int $user_id){
        // 変数user_idから数値（番号を取得する）
        return $this->Where('id','<>',$user_id)->paginate(5);
        // paginate→ページ割（5分割）
    }
}
