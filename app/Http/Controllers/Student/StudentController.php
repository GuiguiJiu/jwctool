<?php


namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($uid)
    {
        $user = Student::find($uid);
        if($user) {
            # 正常显示学生信息
            return view('students.profile')->with([
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
