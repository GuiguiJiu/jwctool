<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jxnu\JxnuLogin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    use JxnuLogin;

    protected $redirectTo = '/password/update';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.update');
    }

    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $old_pwd = $request->has('old-pwd') ? $request->input('old-pwd') : '';
            $new_pwd = $request->has('new-pwd') ? $request->input('new-pwd') : '';
            $check_pwd = $request->has('check-pwd') ? $request->input('check-pwd') : '';
            if (Hash::check($old_pwd, Auth::user()->getAuthPassword())) {
                if ($new_pwd && $check_pwd && $new_pwd == $check_pwd) {
                    $request->user()->fill([
                        'password' =>bcrypt($new_pwd)
                    ])->save();
                }
                return redirect($this->redirectTo)->with('success', '修改密码成功');
            } else {
                return redirect($this->redirectTo)->with('warning', '原密码不正确');
            }
        }
    }

}
