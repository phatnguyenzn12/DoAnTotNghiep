<?php

namespace App\Services;

use Illuminate\Http\Request;
use Omnipay\Omnipay;

class VnPayService
{
    public static function create(
        Request $request,
        $order_code,
        $total_price,
        $bank,
        $discount
    ) {
        // $name = explode(' ', auth()->user()->name);
        // $vnp_Bill_FirstName = array_shift($name);
        // $vnp_Bill_LastName = array_pop($name);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = env('APP_URL') . "/order/return-data-vnpay?discount=$discount";
        $vnp_TmnCode = "9K1CI7PI";
        $vnp_HashSecret = "GVVBTDJXDNJYEIBETIFAUGFIVJHPBJMJ";

        $vnp_TxnRef = $order_code;
        $vnp_OrderInfo = 'thanh toán khóa học online';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total_price * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'VNPAY';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );

        if (isset($request->redirect_vnpay)) {
            header('location:' . $vnp_Url);
            die();
        } else {
            dd(json_encode($returnData));
        }
    }
}
