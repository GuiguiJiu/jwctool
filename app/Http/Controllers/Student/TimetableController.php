<?php


namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('getReportAnalyze');
    }

    public function index()
    {
        $uid = Auth::id();

        $timetables = DB::connection('mysql_jwc')->table('jxnu_timetables')
            ->where('uid', $uid)->orderBy('year');
        if($timetables->exists()) {
            // dd();
            // exit;
            $all_terms_timetables = $timetables->get();
            foreach($all_terms_timetables as $index => $term_timetable) {
                // dd($timetables[$index]->timetable);
                
                $term = $term_timetable->year . $term_timetable->term; // '2018b'
                // dd($term); 

                $courses = json_decode($term_timetable->timetable, true);
                foreach($courses as $key => $course) {
                    // dd($course['course_id']);
                    $course_info = DB::connection('mysql_jwc')->table('jxnu_courses')
                        ->select('identification', 'name_zh_cn', 'credit')->find($course['course_id']);
                    // dd($course_info);

                    $courses[$key]['week'] = $this->weekToChinese($course['week']);
                    $courses[$key]['course_name'] = $course_info->name_zh_cn;
                    $courses[$key]['course_identification'] = $course_info->identification;
                    $courses[$key]['course_credit'] = $course_info->credit;
                }
                // dd($courses);
                $all_terms_timetables[$index]->timetable = $courses;
            }
            // dd($all_terms_timetables);
            return view('students.timetable', [
                'user_name' => Auth::user()->getInfo('name'),
                // 'user_id' => Auth::id(),
                'all_terms_timetables' => $all_terms_timetables, 
            ]);
        } else {
            dd($timetable);
        }
    }

    protected function weekToChinese($week)
    {
        $chinese = ['零','一','二','三','四','五','六','七','八','九'];
        return $chinese[$week];
    }
}
