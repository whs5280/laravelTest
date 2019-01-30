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
    public function index(Request $request){

        $aliPayOrder = [
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            //'total_amount' => $total_amount,
            'subject' => 'test subject',
        ];

        $config = config('alipay.php');
        return Pay::alipay($config)->wap($aliPayOrder);
    }

    // app支付接口
    public function aliPayApp(Request $request){

        $aliPayOrder = [
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => 'test subject',
        ];

        $config = config('alipay.php');

        return Pay::alipay($config)->app($aliPayOrder);
    }

    // 支付宝扫码 支付
    public function aliPayScan(Request $request){

        $aliPayOrder = [
            'out_trade_no' => time(),
            'total_amount' => '0.01',
            'subject' => 'test subject',
        ];

        $config = config('alipay.pay');

        $scan = Pay::alipay($config)->scan($aliPayOrder);

        if(empty($scan->code) || $scan->code !== '10000') return false;

        $url = $scan->code.'?order_guid='.$request->order_guid;
        // 生成二维码
        return  QrCode::encoding('UTF-8')->size(300)->generate($url);

    }

    public function returnback(Request $request){

        $config = config('alipay.php');

        $pay = new Pay($this->$config);
        return $pay->driver('alipay')->gateway()->verify($request->all());
    }

    //支付成功消息提醒
    public function notify(Request $request){

        $config = config('alipay.php');

        $pay = new Pay($this->$config);
        if ($pay->driver('alipay')->gateway()->verify($request->all())){

            file_put_contents(storage_path('notify.txt'), "收到来自支付宝的异步通知\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单号：' . $request->out_trade_no . "\r\n", FILE_APPEND);
            file_put_contents(storage_path('notify.txt'), '订单金额：' . $request->total_amount . "\r\n\r\n", FILE_APPEND);
        } else {
            file_put_contents(storage_path('notify.txt'), "收到异步通知\r\n", FILE_APPEND);
        }

        echo "success";
    }
}