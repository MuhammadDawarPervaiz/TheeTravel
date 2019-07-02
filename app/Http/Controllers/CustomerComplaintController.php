<?php

namespace App\Http\Controllers;

use App\Customer_complaint;
use Illuminate\Http\Request;

class CustomerComplaintController extends Controller
{

    public function sendComplaint(Customer_complaint $obj_customer_complaint)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255|regex:/(^[A-Za-z ]+$)+/',
            'email' => 'required|string|email|max:255',
            'complain' => 'required|string|max:255',
        ]);

        return $obj_customer_complaint->registerComplain();
    }
}
