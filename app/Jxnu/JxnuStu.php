<?php

namespace App\Jxnu;

use Illuminate\Support\Facades\DB;

class JxnuStu
{
    public static function loginPost($id, $pass)
    {
        return [
            '__EVENTTARGET' => '',
            '__EVENTARGUMENT' => '',
            '__LASTFOCUS' => '',
            '__VIEWSTATE' => '/wEPDwUJNjA5MzAzMTcwD2QWAmYPZBYCAgMPZBYGZg8WAh4EVGV4dAUgMjAxOeW5tDLmnIgyNuaXpSDmmJ/mnJ/kuowmbmJzcDtkAgIPZBYCAgEPFgIfAAUS6LSm5Y+35a+G56CB55m75b2VZAIDD2QWBAIBDw8WAh4HVmlzaWJsZWdkFgoCAQ8QZGQWAWZkAgMPZBYCAgEPFgIfAAUG5a2m5Y+3ZAIFDw8WAh8BaGQWAgIBDxAPFgYeDURhdGFUZXh0RmllbGQFDOWNleS9jeWQjeensB4ORGF0YVZhbHVlRmllbGQFCeWNleS9jeWPtx4LXyFEYXRhQm91bmRnZBAVGxLotKLmlL/ph5Hono3lrabpmaIS5Z+O5biC5bu66K6+5a2m6ZmiEuWIneetieaVmeiCsuWtpumZohXlnLDnkIbkuI7njq/looPlrabpmaIS5YWs6LS55biI6IyD55Sf6ZmiEuWbvemZheaVmeiCsuWtpumZohLljJblrabljJblt6XlrabpmaIb6K6h566X5py65L+h5oGv5bel56iL5a2m6ZmiEue7p+e7reaVmeiCsuWtpumZogzmlZnogrLlrabpmaIe5Yab5LqL5pWZ56CU6YOo77yI5q2m6KOF6YOo77yJEuenkeWtpuaKgOacr+WtpumZohvljoblj7LmlofljJbkuI7ml4XmuLjlrabpmaIV6ams5YWL5oCd5Li75LmJ5a2m6ZmiDOe+juacr+WtpumZogzova/ku7blrabpmaIJ5ZWG5a2m6ZmiEueUn+WRveenkeWtpuWtpumZohvmlbDlrabkuI7kv6Hmga/np5HlrablrabpmaIM5L2T6IKy5a2m6ZmiD+WkluWbveivreWtpumZognmloflrabpmaIb54mp55CG5LiO6YCa5L+h55S15a2Q5a2m6ZmiDOW/g+eQhuWtpumZohXmlrDpl7vkuI7kvKDmkq3lrabpmaIM6Z+z5LmQ5a2m6ZmiDOaUv+azleWtpumZohUbCDY4MDAwICAgCDYzMDAwICAgCDgyMDAwICAgCDQ4MDAwICAgCDU3MDAwICAgCDY5MDAwICAgCDYxMDAwICAgCDYyMDAwICAgCDQ1MCAgICAgCDUwMDAwICAgCDM3MDAwICAgCDgxMDAwICAgCDU4MDAwICAgCDQ2MDAwICAgCDY1MDAwICAgCDY3MDAwICAgCDU0MDAwICAgCDY2MDAwICAgCDU1MDAwICAgCDU2MDAwICAgCDUyMDAwICAgCDUxMDAwICAgCDYwMDAwICAgCDQ5MDAwICAgCDY0MDAwICAgCDUzMDAwICAgCDU5MDAwICAgFCsDG2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZxYBZmQCCw8PFgIeCEltYWdlVXJsBSRjaGVja2NvZGUuYXNweD9jb2RlPUEzQTc5NTQwRUY3OTY0MzFkZAINDxYCHwAFEEEzQTc5NTQwRUY3OTY0MzFkAgMPDxYCHwFoZGRky4fN5Cyws8R5Dpde2ZjBQWru1aNrbciv4IS+wCxOR/o=',
            '__EVENTVALIDATION' => '/wEWCgKOxqH3AgKFsp/HCgL+44ewDwKiwZ6GAgKWuv6KDwLj3Z22BgL6up5fAv/WopgDAqbyykwC68zH9gZjaHUPZdpLuhF9FVnbkfPwNArOuBXYQTZaV4/OdNyj8A==',
            '_ctl0:cphContent:ddlUserType' => 'Student',
            '_ctl0:cphContent:txtUserNum' => $id,
            '_ctl0:cphContent:txtPassword' => $pass,
            '_ctl0:cphContent:btnLogin' => '登录',
            '_ctl0:cphContent:txtCheckCode' => 'LLC4',
        ];
    }

    public static function getAvatar($id)
    {
        return 'http://jwc.jxnu.edu.cn/StudentPhoto/' . $id . '.jpg';
    }



    public static function getCookie($cookies)
    {
        $target = '';
        foreach($cookies as $cookie)
        {
            $target .= $cookie['Name'] . '=' . $cookie['Value'] . ';';
        }
        return $target;
    }
}
