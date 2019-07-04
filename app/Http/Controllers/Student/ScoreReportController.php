<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\type;
// use App\Http\Controllers\Student\GPA;

class ScoreReportController extends Controller
{
    use GPA;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $uid = Auth::id();
        $user = DB::connection('mysql_jwc')->table('jxnu_score_reports')
            ->where('uid' ,$uid);

            
            if ($user->exists()) {
                $result = $user->get()[0];
                $reports = json_decode($result->score_reports,true);
                $normal_gpa = $this->countGPA($reports, $this->normal_rule);
                $normal_gpa_pro = $this->countGPA($reports, $this->normal_rule, true);
                $normal1_gpa = $this->countGPA($reports, $this->normal1_rule);
                $normal2_gpa = $this->countGPA($reports, $this->normal2_rule);
                $beida_gpa = $this->countGPA($reports, $this->beida_rule);
           
                return view('students.score-reports')->with([
                    'score_reports' => $reports,
                    'user' => Auth::user(),
                    'normal_gpa' => $normal_gpa,
                    'normal_gpa_pro' => $normal_gpa_pro,
                    'normal1_gpa' => $normal1_gpa,
                    'normal2_gpa' => $normal2_gpa,
                    'beida_gpa' => $beida_gpa,
            ]);
        }
    }
    

}
