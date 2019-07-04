<?php


namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportAnalyzeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('getReportAnalyze');
    }

    public function index()
    {
        $uid = Auth::id();

        return view('students.report-analyze', [
            'user_name' => Auth::user()->getInfo('name'),
            'user_id' => Auth::id()
        ]);
    }

    public function getReportAnalyze($uid)
    {
        $user = DB::connection('mysql_jwc')->table('jxnu_score_reports')
            ->select('uid', 'report_analyze')->where('uid', $uid);
        if ($user->exists()) {
            $result = $user->get()[0];
            return $result->report_analyze;
        }
        return null;
    }
}
