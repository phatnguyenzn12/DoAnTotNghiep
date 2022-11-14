<?php

namespace App\Services;

use Illuminate\Http\Request;
use Omnipay\Omnipay;

class OmnipayService
{

    public function create($total_price, $order_code)
    {

        $gateway = Omnipay::create('VNPay');

        $gateway->initialize([
            'vnp_TmnCode' => '9K1CI7PI',
            'vnp_HashSecret' => 'GVVBTDJXDNJYEIBETIFAUGFIVJHPBJMJ',
        ]);

        $response = $gateway->purchase([
            'vnp_TxnRef' => $order_code,
            'vnp_OrderType' => 'billpayment',
            'vnp_OrderInfo' => 'thanh toán khóa học online',
            'vnp_IpAddr' =>  request()->ip(),
            'vnp_Amount' => $total_price,
            'vnp_ReturnUrl' => 'http://127.0.0.1:8000/order/payment',
        ])->send();

        if ($response->isSuccessful()) {
            // TODO: xử lý kết quả và hiển thị.
            print $response->getTransactionId();
            print $response->getTransactionReference();

            var_dump($response->getData()); // toàn bộ data do VNPay gửi về.

        } else {
            print $response->getMessage();
        }
        if ($response->isRedirect()) {
            $redirectUrl = $response->getRedirectUrl();
            // TODO: chuyển khách sang trang VNPay để thanh toán
        }
    }
}
