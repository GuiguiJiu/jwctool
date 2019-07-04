<?php

namespace App\Jxnu;

use Illuminate\Support\Facades\DB;

class JxnuTea
{
    public static function loginPost($id, $pass)
    {
        return [
            '__EVENTTARGET' => '',
            '__EVENTARGUMENT' => '',
            '__LASTFOCUS' => '',
            '__VIEWSTATE' => '/wEPDwUJNjA5MzAzMTcwD2QWAmYPZBYCAgMPZBYGZg8WAh4EVGV4dAUgMjAxOeW5tDXmnIgyOOaXpSDmmJ/mnJ/kuowmbmJzcDtkAgIPZBYCAgEPFgIfAAUS6LSm5Y+35a+G56CB55m75b2VZAIDD2QWBAIBDw8WAh4HVmlzaWJsZWdkFgoCAQ8QZGQWAQIBZAIDD2QWAgIBDxYCHwAFBuaVmeWPt2QCBQ8PFgIfAWhkFgICAQ8QDxYGHg1EYXRhVGV4dEZpZWxkBQzljZXkvY3lkI3np7AeDkRhdGFWYWx1ZUZpZWxkBQnljZXkvY3lj7ceC18hRGF0YUJvdW5kZ2QQFRsS6LSi5pS/6YeR6J6N5a2m6ZmiEuWfjuW4guW7uuiuvuWtpumZohLliJ3nrYnmlZnogrLlrabpmaIV5Zyw55CG5LiO546v5aKD5a2m6ZmiEuWbvemZheaVmeiCsuWtpumZohLljJblrabljJblt6XlrabpmaIb6K6h566X5py65L+h5oGv5bel56iL5a2m6ZmiEue7p+e7reaVmeiCsuWtpumZogzmlZnogrLlrabpmaIe5Yab5LqL5pWZ56CU6YOo77yI5q2m6KOF6YOo77yJEuenkeWtpuaKgOacr+WtpumZohvljoblj7LmlofljJbkuI7ml4XmuLjlrabpmaIV6ams5YWL5oCd5Li75LmJ5a2m6ZmiDOe+juacr+WtpumZohLlhY3otLnluIjojIPnlJ/pmaIM6L2v5Lu25a2m6ZmiCeWVhuWtpumZohLnlJ/lkb3np5HlrablrabpmaIb5pWw5a2m5LiO5L+h5oGv56eR5a2m5a2m6ZmiDOS9k+iCsuWtpumZog/lpJblm73or63lrabpmaIJ5paH5a2m6ZmiG+eJqeeQhuS4jumAmuS/oeeUteWtkOWtpumZogzlv4PnkIblrabpmaIV5paw6Ze75LiO5Lyg5pKt5a2m6ZmiDOmfs+S5kOWtpumZogzmlL/ms5XlrabpmaIVGwg2ODAwMCAgIAg2MzAwMCAgIAg4MjAwMCAgIAg0ODAwMCAgIAg2OTAwMCAgIAg2MTAwMCAgIAg2MjAwMCAgIAg0NTAgICAgIAg1MDAwMCAgIAgzNzAwMCAgIAg4MTAwMCAgIAg1ODAwMCAgIAg0NjAwMCAgIAg2NTAwMCAgIAg1NzAwMCAgIAg2NzAwMCAgIAg1NDAwMCAgIAg2NjAwMCAgIAg1NTAwMCAgIAg1NjAwMCAgIAg1MjAwMCAgIAg1MTAwMCAgIAg2MDAwMCAgIAg0OTAwMCAgIAg2NDAwMCAgIAg1MzAwMCAgIAg1OTAwMCAgIBQrAxtnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2cWAWZkAgsPDxYCHghJbWFnZVVybAUkY2hlY2tjb2RlLmFzcHg/Y29kZT1CQUJCMDM1MUZBMzUyQ0VDZGQCDQ8WAh8ABRBCQUJCMDM1MUZBMzUyQ0VDZAIDDw8WAh8BaGRkZG2kGaQKjdI6LZHlHqYBu5tqqFHiuOZe6Kz4Rx2A9Jsa',
            '__EVENTVALIDATION' => '/wEWCgLA2f9NAoWyn8cKAv7jh7APAqLBnoYCApa6/ooPAuPdnbYGAvq6nl8C/9aimAMCpvLKTALrzMf2BglT/R86BAkQzo21YMAmo4oo1NsTrg+UaZ36COzcsYwQ',
            '_ctl0:cphContent:ddlUserType' => 'Teacher',
            '_ctl0:cphContent:txtUserNum' => $id,
            '_ctl0:cphContent:txtPassword' => $pass,
            '_ctl0:cphContent:btnLogin' => '登录',
            '_ctl0:cphContent:txtCheckCode' => 'PYQF',
        ];
    }

    public static function getAvatar($id)
    {
        return 'http://jwc.jxnu.edu.cn/TeacherPhotos/' . $id . '.jpg';
    }

}
