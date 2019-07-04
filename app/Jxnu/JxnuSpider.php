<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/18 0018
 * Time: 09:26
 */

namespace App\Jxnu;

use QL\QueryList;

trait JxnuSpider
{
    static function getStudentInfo($id)
    {
        // 未传 id 则返回错误
        $id = $request->input('id');
        if (!$id) exit(json_encode([ 'code'  => -401, 'error' => "未输入学号"]));

        // 采集信息
        $url = 'http://jwc.jxnu.edu.cn/MyControl/All_Display.aspx?UserControl=All_StudentInfor.ascx&UserType=Student&UserNum=' . $id;
        $ql = QueryList::get($url,null,[
            'headers' => [
                // 携带cookie
                'Cookie'    => 'JwOAUserSettingNew=;'
            ]
        ])->removeHead();

        //处理部分信息
        $ql->find('#_ctl11_Photo')->attr('src', "http://jwc.jxnu.edu.cn/MyControl/All_PhotoShow.aspx?UserType=Student&UserNum=$id");
        $ql->find('#_ctl11_lblSFZH')->text('');

        // 返回 json
        $stuInfo = [
            'class'             => $ql->find('#_ctl11_lblBJ')->text(),
            'id'                => $id,
            'name'              => $ql->find('#_ctl11_lblXM')->text(),
            'gender'            => $ql->find('#_ctl11_lblXB')->text(),
            'birthday'          => $ql->find('#_ctl11_lblCSRQ')->text(),
            'idCard'            => $ql->find('#_ctl11_lblSFZH')->text(),
            'politicalStatus'   => $ql->find('#_ctl11_lblZZMM')->text(),
            'place'             => $ql->find('#_ctl11_lblYJ')->text(),
            'email'             => $ql->find('#_ctl11_lblYJ')->text(),
            'tel'               => $ql->find('#_ctl11_lblTXHM')->text(),
            'img'               => $ql->find('#_ctl11_Photo')->attr('src'),
        ];
        return json_encode([
            'code'    => 200,
            'data'    => $stuInfo,
            'message' => 'success'
        ]);
    }
}
