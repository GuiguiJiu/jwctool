<?php
/**
 * Created by PhpStorm.
 * User: wujia
 * Date: 2019-4-2
 * Time: 21:14
 */

namespace App\Jxnu;

use QL\QueryList;
use QL\Services\HttpService;
use Illuminate\Http\Request;

/**
 * Trait JxnuLogin
 *  用于管理Jxnu教务在线模拟登录模块
 *  支持的登录用户类型有Student Teacher
 * @package App\Jxnu
 */
trait JxnuLogin
{

    function loginIntoJxnu($id, $pass, $type)
    {
        if ($id && $pass && $type && !is_numeric($id))
            return false;

            $post = [
                '__EVENTTARGET' => '',
                '__EVENTARGUMENT' => '',
                '__LASTFOCUS' => '',
                '__VIEWSTATE' => '/wEPDwUJNjA5MzAzMTcwD2QWAmYPZBYCAgMPZBYGZg8WAh4EVGV4dAUgMjAxOeW5tDTmnIgxM+aXpSDmmJ/mnJ/lha0mbmJzcDtkAgIPZBYCAgEPFgIfAAUS6LSm5Y+35a+G56CB55m75b2VZAIDD2QWBAIBDw8WAh4HVmlzaWJsZWdkFgoCAQ8QZGQWAWZkAgMPZBYCAgEPFgIfAAUG5a2m5Y+3ZAIFDw8WAh8BaGQWAgIBDxAPFgYeDURhdGFUZXh0RmllbGQFDOWNleS9jeWQjeensB4ORGF0YVZhbHVlRmllbGQFCeWNleS9jeWPtx4LXyFEYXRhQm91bmRnZBAVGxLotKLmlL/ph5Hono3lrabpmaIS5Z+O5biC5bu66K6+5a2m6ZmiEuWIneetieaVmeiCsuWtpumZohXlnLDnkIbkuI7njq/looPlrabpmaIS5YWs6LS55biI6IyD55Sf6ZmiEuWbvemZheaVmeiCsuWtpumZohLljJblrabljJblt6XlrabpmaIb6K6h566X5py65L+h5oGv5bel56iL5a2m6ZmiEue7p+e7reaVmeiCsuWtpumZogzmlZnogrLlrabpmaIe5Yab5LqL5pWZ56CU6YOo77yI5q2m6KOF6YOo77yJEuenkeWtpuaKgOacr+WtpumZohvljoblj7LmlofljJbkuI7ml4XmuLjlrabpmaIV6ams5YWL5oCd5Li75LmJ5a2m6ZmiDOe+juacr+WtpumZogzova/ku7blrabpmaIJ5ZWG5a2m6ZmiEueUn+WRveenkeWtpuWtpumZohvmlbDlrabkuI7kv6Hmga/np5HlrablrabpmaIM5L2T6IKy5a2m6ZmiD+WkluWbveivreWtpumZognmloflrabpmaIb54mp55CG5LiO6YCa5L+h55S15a2Q5a2m6ZmiDOW/g+eQhuWtpumZohXmlrDpl7vkuI7kvKDmkq3lrabpmaIM6Z+z5LmQ5a2m6ZmiDOaUv+azleWtpumZohUbCDY4MDAwICAgCDYzMDAwICAgCDgyMDAwICAgCDQ4MDAwICAgCDU3MDAwICAgCDY5MDAwICAgCDYxMDAwICAgCDYyMDAwICAgCDQ1MCAgICAgCDUwMDAwICAgCDM3MDAwICAgCDgxMDAwICAgCDU4MDAwICAgCDQ2MDAwICAgCDY1MDAwICAgCDY3MDAwICAgCDU0MDAwICAgCDY2MDAwICAgCDU1MDAwICAgCDU2MDAwICAgCDUyMDAwICAgCDUxMDAwICAgCDYwMDAwICAgCDQ5MDAwICAgCDY0MDAwICAgCDUzMDAwICAgCDU5MDAwICAgFCsDG2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZxYBZmQCCw8PFgIeCEltYWdlVXJsBSRjaGVja2NvZGUuYXNweD9jb2RlPUEwRDM0OTkyRTY0QTA4QTlkZAINDxYCHwAFEEEwRDM0OTkyRTY0QTA4QTlkAgMPDxYCHwFoZGRkVKkChFZpdlQPdlHy2JNRlch/myJywKCzK0eOTM5tgKI=',
                '__EVENTVALIDATION' => '/wEWCgL+uuD+AgKFsp/HCgL+44ewDwKiwZ6GAgKWuv6KDwLj3Z22BgL6up5fAv/WopgDAqbyykwC68zH9gaIVcuoN2ppvvS2+yQJvvk3Fl/uM/vu9jcD1EIn80deUg==',
                '_ctl0:cphContent:ddlUserType' => $type,
                '_ctl0:cphContent:txtUserNum' => $id,
                '_ctl0:cphContent:txtPassword' => $pass,
                '_ctl0:cphContent:txtCheckCode' => 'YUN3',
                '_ctl0:cphContent:btnLogin' => '登录',
            ];

        // 模拟登录
        $ql = QueryList::post('http://jwc.jxnu.edu.cn/Portal/LoginAccount.aspx?t=account', $post)
            ->removeHead();

        // 根据登录后的cookie 检查是否登录成功
        $loginCookies = HttpService::getCookieJar()->toArray();
        if (count($loginCookies) >= 2)
            return true;
        else
            return false;
    }


    private function _loginJxnuAsStudent($id, $pass)
    {
        // 模拟登录验证合法性
        $ql = QueryList::post('http://jwc.jxnu.edu.cn/Portal/LoginAccount.aspx?t=account', JxnuStu::loginPost($id, $pass))
            ->removeHead();

        // 返回结果
        $login_cookie = HttpService::getCookieJar()->toArray();

        // 检验令牌
        if (count($login_cookie) <= 1) {
            // 无令牌 检验alert弹窗
            return $this->_check_alert($ql);
        } else {
            /**
             * 查询学生基本信息
             */
            // 学生信息页面
            $ql->get('http://jwc.jxnu.edu.cn/MyControl/All_Display.aspx?UserControl=All_StudentInfor.ascx&UserType=Student&UserNum=' . $id)->removeHead();
            // 有令牌则返回
            $data = [
                'id'                => $id,
                'class'             => trim($ql->find('#_ctl11_lblBJ')->text()),    //学号
                'name'              => trim($ql->find('#_ctl11_lblXM')->text()),    //姓名
                'gender'            => trim($ql->find('#_ctl11_lblXB')->text()),    //性别
                'birthday'          => trim($ql->find('#_ctl11_lblCSRQ')->text()),  //出生日期
                'id_card'            => trim($ql->find('#_ctl11_lblSFZH')->text()),  //身份证号
                'political_status'   => trim($ql->find('#_ctl11_lblZZMM')->text()),  //政治面貌
                'place'             => trim($ql->find('#_ctl11_lblYJ')->text()),    //籍贯
                'email'             => trim($ql->find('#_ctl11_lblYJ')->text()),    //邮箱
                'tel'               => trim($ql->find('#_ctl11_lblTXHM')->text()),  //电话
                // 专业
                // 学院
                'cookie'            => $login_cookie,
            ];
            $ql->get('http://jwc.jxnu.edu.cn/MyControl/All_Display.aspx?UserControl=xfz_bysh.ascx&Action=Personal')->removeHead();
            $data['major'] = trim($ql->find('#_ctl11_lblTitle u:eq(0)')->text());

            return json_encode([
                'code' => 200,
                'data' => $data
            ]);
        }
    }

    private function _loginJxnuAsTeacher($id, $pass)
    {
        // 模拟登录验证合法性
        $ql = QueryList::post('http://jwc.jxnu.edu.cn/Portal/LoginAccount.aspx?t=account', JxnuTea::loginPost($id, $pass))
            ->removeHead();

        // 返回结果
        $login_cookie = HttpService::getCookieJar()->toArray();
        // 检验令牌
        if (count($login_cookie) <= 1) {
            // 无令牌 检验alert弹窗
            return $this->_check_alert($ql);
        } else {
            /**
             * 查询教师基本信息
             */
            // 教师信息页面
            $ql->get('http://jwc.jxnu.edu.cn/MyControl/All_Display.aspx?UserControl=All_TeacherInfor.ascx&UserType=Teacher&UserNum=' . $id)->removeHead();
            // 有令牌则返回

            $data['id']      = $id;
            $data['name']    = trim($ql->find('#_ctl11_lblName')->text());    //姓名
            $data['gender']  = trim($ql->find('#_ctl11_lblSex')->text());    //性别
            $data['email']   = trim($ql->find('#_ctl11_lblEmail')->text());    //邮箱
            $data['zz']      = trim($ql->find('#_ctl11_lblZC')->text());    //职称
            $data['jj']      = trim($ql->find('#_ctl11_lblJJ')->text());    //教学简介
            $data['cookie']  = $login_cookie;


            $ql->get('http://jwc.jxnu.edu.cn/MyControl/Phone.aspx')->removeHead();
            $data['college'] = trim($ql->find('#lblInfor u:eq(0)')->text());  //单位
            $data['tel']     = trim($ql->find('#lblInfor u:eq(3)')->text());  //电话

            return json_encode([
                'code' => 200,
                'data' => $data
            ]);
        }
    }

    private function _check_alert($ql)
    {
        $err_script = $ql->find('form>script:eq(1)')->html();
        if ($err_script)
            return json_encode(['code'  => -501, 'error' => substr($err_script, 7, -3)]);
        else
            return json_encode(['code'  => -502, 'error' => '未捕获登录信息，未捕获错误，请联系 wujiankun1998@qq.com']);
    }

}
