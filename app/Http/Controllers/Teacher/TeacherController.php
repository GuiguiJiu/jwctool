<?php


namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($uid)
    {
        $user = Teacher::find($uid);
        if($user) {
            # 正常显示教师信息
            return view('teachers.profile')->with([
                'user' => $user,
            ]);
        }
        # 其他情况显示404
        return view('404');
    }

    public function getReportAnalyze($uid)
    {

    }
}
