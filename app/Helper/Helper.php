<?php


namespace App\Helper;

use App\User;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function getUserAvatar(User $user)
    {
        switch ($user->type) {
            case 'Teacher':
                return 'http://jwc.jxnu.edu.cn/TeachersPhoto/' . $user->id . '.jpg';
            case 'Student':
                return 'http://jwc.jxnu.edu.cn/StudentPhoto/' . $user->id . '.jpg';
            default:
                break;
        }
    }

    public static function getUserInfo(User $user)
    {
        switch ($user->type) {
            case 'Teacher':
                $tea = DB::connection('mysql_jwc')->table('teachers')->findOrFaild($user->id);
                return $tea;
            case 'Student':
                return 'http://jwc.jxnu.edu.cn/StudentPhoto/' . $user->id . '.jpg';
            default:
                break;
        }
    }
}
