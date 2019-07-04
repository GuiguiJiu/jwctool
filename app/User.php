<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    public $info = [];

    // 修改主键
    protected $primaryKey = 'id';
    public $incrementing = false;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'password', 'type', 'gender', 'avatar', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function getAvatar()
    {
        switch ($this->type) {
            case 'Teacher':
                return 'http://jwc.jxnu.edu.cn/TeacherPhotos/' . $this->id . '.jpg';
            case 'Student':
                return 'http://jwc.jxnu.edu.cn/StudentPhoto/' . $this->id . '.jpg';
            default:
                break;
        }
    }

    public function getInfo($key='')
    {

        switch ($this->type) {
            case 'Teacher':
                $user = DB::connection('mysql_jwc')->table('jxnu_teachers')->find($this->id);
                return $key ? $user->{$key} : $user;
            case 'Student':
                $user = DB::connection('mysql_jwc')->table('jxnu_students')->find($this->id);
                return $key ? $user->{$key} : $user;
            default:
                break;
        }
    }
}
