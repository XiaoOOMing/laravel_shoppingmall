<?php

namespace App\Http\Controllers\Service;

use App\Tools\Validatecode\Validatecode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    // 验证码
    public function validate_code(Request $request)
    {
        $code = new Validatecode();
        $res = $code->doImg();
        $request->session()->put('validate_code', $code->getCode());
        $code->getCode();
        return $res;
    }
}
