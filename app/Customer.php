<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

    public static function storeCustomer($first_name, $last_name, $fathers_name, $transport, $phone, $email)
    {
        $customer = new Customer();
        $customer->first_name = $first_name;
        $customer->last_name = $last_name;
        $customer->fathers_name = $fathers_name;
        $customer->transport = $transport;
        $customer->phone = $phone;
        $customer->email = $email;
        return $customer ->save();
    }
}
