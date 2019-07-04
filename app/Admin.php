<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //表名
    protected $table = 'admin_users';

    //指定允许批量赋值的字段
    protected $fillable = [
        'id', 'name', 'password',
    ];

    //指定不允许批量赋值的字段
    // protected $guarded = [];

    //自动维护时间戳
    // public $timestamps = false;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}