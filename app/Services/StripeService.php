<?php

namespace App\Services;
use Stripe\Stripe;
class StripeService
{

    public function __construct()
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    }
    /**
     * storage_image
     *
     * @param  mixed $request_img
     * @return string
     */
    public static function storage_image($request_img)
    {

    }
}
