<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jxnu\JxnuLogin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    use JxnuLogin;

    protected $redirectToLogin = '/login';
    protected $redirectToReset = '/password/reset';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request)
    {
        if ($request->method() == 'POST') {
            $uid = $request->has('uid') ? $request->input('uid') : '';
            $pwd = $request->has('pwd') ? $request->input('pwd') : '';
            $type = $request->has('type') ? $request->input('type') : '';

            if ($this->loginIntoJxnu($uid, $pwd, $type)) {
                $user = User::find($uid);
                $user->password = bcrypt($pwd);
                if($user->save()) {
                    return redirect($this->redirectToReset)->with('success', '重置成功，现在密码为教务在线密码');
                }
            } else {
                return redirect($this->redirectToReset)->with('warning', '重置失败，帐号或密码错误');
            }
        }
        return redirect($this->redirectToReset)->with('warning', '重置失败，可能是因为方法不是POST');
    }
}
