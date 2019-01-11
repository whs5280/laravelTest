<?php
/**
 * 支付接口
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yansongda\Pay\Pay;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class AliPayController extends Controller
{
    // 手机网页支付接口
    public function aliPay(Request $request){

        $aliPayOrder = [
            'out_trade_no' => time(),
            'total_amount' => '1000', // 支付金额
            'subject'      => $request->subject ?? '支付宝手机网页支付' // 备注
        ];

        $config = config('alipay.pay');


    }
}