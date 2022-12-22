<?php

namespace Database\Factories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PercentagePayable>
 */
class PercentagePayableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $i = 0;
        $orderDetail = OrderDetail::where('id', ++$i)->first();
        $price_admin = $orderDetail->price - ($orderDetail->price * ($orderDetail->percentage_pay / 100));
        $price_teacher = $orderDetail->price - $price_admin;
        return [
            'mentor_id' => 2,
            'order_detail_id' => $orderDetail->id,
            'amount_paid_admin' => $price_admin,
            'amount_paid_teacher' => $price_teacher,
        ];
    }
}
