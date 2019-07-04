<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Jxnu\JxnuLogin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Jxnu\JxnuStu;
use QL\QueryList;
use QL\Services\HttpService;

class LoginController extends Controller
{
    use AuthenticatesUsers, JxnuLogin;

    protected $redirectPath = '/where/you/want';
    public $firstLogin = false;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        # 获取表单数据
        $user_id = $request->input('number');
        $user_pwd = $request->input('password');
        $user_type = $request->input('type');
        $remember = $request->input('remember') ? true : false;

        # 验证是否是管理员
        $user = User::find($user_id);
        if ($user && $user->type == 'Admin' && $user_type == 'Teacher') {
            if (Auth::attempt(['id' => $user_id, 'password' => $user_pwd], $remember)):
                return redirect()->intended('/');  ### 登录成功()
            else:
                return back()->with('msg', '登录失败，帐号或密码不正确')->withInput(); ### 登录失败()
            endif;
        }
        # 查询是否存在 uid
        if ($user && $user->type == $user_type) {
            ## 如果存在 uid, 直接验证数据库中的密码
            if (Auth::attempt(['id' => $user_id, 'password' => $user_pwd], $remember)):
                return redirect()->intended('/');  ### 登录成功()
            else:
                return back()->with('msg', '登录失败，帐号或密码不正确')->withInput(); ### 登录失败()
            endif;
        } else {
            ## 当第一次登录系统时 模拟登录教务在线
            if ($this->loginIntoJxnu($user_id, $user_pwd, $user_type)) {
                $user = User::create([
                    'id' => (string)$user_id,
                    'password' => bcrypt($user_pwd),
                    'type' => $user_type
                ]);  ## 获取用户信息 把用户加入到users表中
                Auth::login($user, $remember); ### 手动认证
                if ($user_type == 'Student') {
                    $this->fetchStudentInfo($user_id);
                    $this->fetchStudentScoreReport($user_id, $user_pwd);
                } else {

                }

                $this->pullInfoFromDBJwc($user); ### 登录成功()
                return redirect('/');
            } else {
                return back()->with('msg', '登录失败，帐号或密码不正确')->withInput(); ### 登录失败()
            }
        }
    }


    /**
     * 从 jwc 数据库中拉取数据，保存到jwcdbs中
     * 主要为用户首次登录或手动更新时使用
     * @param $user
     */
    function pullInfoFromDBJwc($user)
    {
        $info = DB::connection('mysql_jwc')->table('jxnu_' . strtolower($user->type) . 's')->find($user->id);
        $arr = [
            'name' => $info->name,
            'gender' => $info->gender
        ];

        $user->fill($arr);
        $user->save();
    }


    /**
     * 用户退出
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    function logout()
    {
        setcookie('pp', null, -1);
        $this->guard()->logout();
        return redirect('/');
    }


    /**
     * 根据学号获取学生基本信息
     * @param $uid
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchStudentInfo($uid)
    {
        $api_uri = "http://39.108.229.185/students/{$uid}";
        $client = new \GuzzleHttp\Client();
        $client->request('PUT', $api_uri);
    }


    /**
     * 用户首次登录成功，获取信息后，再次获取成绩信息
     * @param $uid
     * @param $pwd
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchStudentScoreReport($uid, $pwd)
    {
        $post = [
            '__EVENTTARGET' => '',
            '__EVENTARGUMENT' => '',
            '__LASTFOCUS' => '',
            '__VIEWSTATE' => '/wEPDwUJNjA5MzAzMTcwD2QWAmYPZBYCAgMPZBYGZg8WAh4EVGV4dAUgMjAxOeW5tDTmnIgxM+aXpSDmmJ/mnJ/lha0mbmJzcDtkAgIPZBYCAgEPFgIfAAUS6LSm5Y+35a+G56CB55m75b2VZAIDD2QWBAIBDw8WAh4HVmlzaWJsZWdkFgoCAQ8QZGQWAWZkAgMPZBYCAgEPFgIfAAUG5a2m5Y+3ZAIFDw8WAh8BaGQWAgIBDxAPFgYeDURhdGFUZXh0RmllbGQFDOWNleS9jeWQjeensB4ORGF0YVZhbHVlRmllbGQFCeWNleS9jeWPtx4LXyFEYXRhQm91bmRnZBAVGxLotKLmlL/ph5Hono3lrabpmaIS5Z+O5biC5bu66K6+5a2m6ZmiEuWIneetieaVmeiCsuWtpumZohXlnLDnkIbkuI7njq/looPlrabpmaIS5YWs6LS55biI6IyD55Sf6ZmiEuWbvemZheaVmeiCsuWtpumZohLljJblrabljJblt6XlrabpmaIb6K6h566X5py65L+h5oGv5bel56iL5a2m6ZmiEue7p+e7reaVmeiCsuWtpumZogzmlZnogrLlrabpmaIe5Yab5LqL5pWZ56CU6YOo77yI5q2m6KOF6YOo77yJEuenkeWtpuaKgOacr+WtpumZohvljoblj7LmlofljJbkuI7ml4XmuLjlrabpmaIV6ams5YWL5oCd5Li75LmJ5a2m6ZmiDOe+juacr+WtpumZogzova/ku7blrabpmaIJ5ZWG5a2m6ZmiEueUn+WRveenkeWtpuWtpumZohvmlbDlrabkuI7kv6Hmga/np5HlrablrabpmaIM5L2T6IKy5a2m6ZmiD+WkluWbveivreWtpumZognmloflrabpmaIb54mp55CG5LiO6YCa5L+h55S15a2Q5a2m6ZmiDOW/g+eQhuWtpumZohXmlrDpl7vkuI7kvKDmkq3lrabpmaIM6Z+z5LmQ5a2m6ZmiDOaUv+azleWtpumZohUbCDY4MDAwICAgCDYzMDAwICAgCDgyMDAwICAgCDQ4MDAwICAgCDU3MDAwICAgCDY5MDAwICAgCDYxMDAwICAgCDYyMDAwICAgCDQ1MCAgICAgCDUwMDAwICAgCDM3MDAwICAgCDgxMDAwICAgCDU4MDAwICAgCDQ2MDAwICAgCDY1MDAwICAgCDY3MDAwICAgCDU0MDAwICAgCDY2MDAwICAgCDU1MDAwICAgCDU2MDAwICAgCDUyMDAwICAgCDUxMDAwICAgCDYwMDAwICAgCDQ5MDAwICAgCDY0MDAwICAgCDUzMDAwICAgCDU5MDAwICAgFCsDG2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZxYBZmQCCw8PFgIeCEltYWdlVXJsBSRjaGVja2NvZGUuYXNweD9jb2RlPUEwRDM0OTkyRTY0QTA4QTlkZAINDxYCHwAFEEEwRDM0OTkyRTY0QTA4QTlkAgMPDxYCHwFoZGRkVKkChFZpdlQPdlHy2JNRlch/myJywKCzK0eOTM5tgKI=',
            '__EVENTVALIDATION' => '/wEWCgL+uuD+AgKFsp/HCgL+44ewDwKiwZ6GAgKWuv6KDwLj3Z22BgL6up5fAv/WopgDAqbyykwC68zH9gaIVcuoN2ppvvS2+yQJvvk3Fl/uM/vu9jcD1EIn80deUg==',
            '_ctl0:cphContent:ddlUserType' => 'Student',
            '_ctl0:cphContent:txtUserNum' => $uid,
            '_ctl0:cphContent:txtPassword' => $pwd,
            '_ctl0:cphContent:txtCheckCode' => 'YUN3',
            '_ctl0:cphContent:btnLogin' => '登录',
        ];

        // 模拟登录
        $ql = QueryList::post('http://jwc.jxnu.edu.cn/Portal/LoginAccount.aspx?t=account', $post)
            ->removeHead();

        $ql = $ql->get('http://jwc.jxnu.edu.cn/MyControl/All_Display.aspx', [
            'UserControl' => 'xfz_cj.ascx',
            'Action' => 'Personal'
        ])->removeHead();

        $user_infos = $ql->find('#_ctl11_lblMsg');
        $uid = $user_infos->find('u:eq(3)')->text();
        $total_credit = $user_infos->find('u:eq(5)')->text();
        // 这里要处理一下总学分 有的会写成 "125 + 25 = 150" 这种形式
        $total_credit = strlen($total_credit) > 3 ? (int)trim(explode('=', $total_credit)[1]) : (int)$total_credit;

        if ($user_infos && $uid && $total_credit) {
            // 采集表
            $table = $ql->find('table#_ctl11_dgContent');
            // 采集表的每行内容
            $table_rows = $table->find('tr:gt(0)')->map(function ($row) {
                return $row->find('td')->texts()->all();
            });

            $course_reports = $table_rows->all(); // 所有课程成绩单
            $reports = []; // 课程成绩单
            $term = ''; // 学期
            foreach ($course_reports as $course_report) {
                // 成绩表格一般每行有7列 8列说明包含学期信息
                $i = 0;
                if (count($course_report) == 8) { // 一行有8列
                    $term = $course_report[0];
                    $i = 1;
                }
                $reports[$term][] = [
                    "课程号" => $course_report[0 + $i],
                    "课程名称" => $course_report[1 + $i],
                    "所得学分" => (int)$course_report[2 + $i],
                    "课程成绩" => (int)$course_report[3 + $i],
                    "补考成绩" => (float)$course_report[4 + $i] ? (int)$course_report[4 + $i] : "",
                    "标准分" => (float)$course_report[5 + $i],
                    "备注" => $course_report[6 + $i],
                ];
            }

            $standard_scores = $this->countMean($reports);
            $scores_rank = $this->countRank($reports);
            $score_reports = [
                'total_credits' => $total_credit,
                'reports' => $reports,
                'standard_scores' => $standard_scores,
                'scores_rank' => $scores_rank
            ];

            if (DB::connection('mysql_jwc')->table('jxnu_score_reports')->where('uid', $uid)->doesntExist()) {
                DB::connection('mysql_jwc')->insert("insert into jxnu_score_reports (uid, total_credits, score_reports, report_analyze, total_points, rank, points) values(?, ?, ?, ?, ?, ?, ?)", [
                    $uid, json_encode($score_reports['total_credits']), json_encode($score_reports['reports']),
                    json_encode($score_reports['standard_scores']), json_encode($score_reports['scores_rank']),
                    $score_reports['scores_rank']['rank'], $score_reports['scores_rank']['point'],
                ]);
            }
        }
    }


    /**
     * 根据学号获取学生基本信息
     * @param $uid
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchStudentInfoByApi($uid)
    {
        $api_uri = "http://39.108.229.185/students/{$uid}";
        $client = new \GuzzleHttp\Client();
        $client->request('PUT', $api_uri);
    }


    /**
     * 用户首次登录成功，获取信息后，再次获取成绩信息
     * @param $uid
     * @param $pwd
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fetchStudentScoreReportByApi($uid, $pwd)
    {
        $api_uri = "http://39.108.229.185/students/{$uid}/score_reports";
        $client = new \GuzzleHttp\Client();
        $client->request('PUT', $api_uri, [
            'query' => [
                'pwd' => $pwd
            ]
        ]);
    }

    /**
     * 计算加权平均分
     */
    protected function countMean($reports)
    {
        $standard_scores = [];
        // 遍历每个学期
        foreach ($reports as $term => $repos) {
            $credits = 0.0;     // 总学分
            $mean_scores = 0.0; // 总加权标准分
            foreach ($repos as $repo) {

                $mean_scores += $repo['所得学分'] * $repo['标准分']; //累加加权标准分
                $credits += $repo['所得学分']; //累加学分
            }
            $standard_scores[$term] = $credits == 0 ? 0 : $mean_scores / $credits;
        }

        return $standard_scores;
    }

    /**
     * 计算学习评定等级
     */
    public function countRank($reports)
    {
        $total_credits = 0;
        $total_points = 0;
        foreach ($reports as $term => $report) {
            foreach ($report as $course) {
                if ($course['所得学分'] == "")
                    continue;
                $total_credits += $course['所得学分'];
                $total_points += $course['标准分'] * $course['所得学分'];
            }
        }
        $final_point = $total_points / $total_credits;

        if ($final_point >= 0.8) $rank = 'A';
        elseif ($final_point >= 0.4) $rank = 'B';
        elseif ($final_point >= -0.2) $rank = 'C';
        else $rank = 'F';
        return [
            'point' => $final_point,
            'rank' => $rank
        ];
    }

}
