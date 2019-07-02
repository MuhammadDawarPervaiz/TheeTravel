<?php

namespace App;

use App\Model;
use App\Customer;

class Customer_complaint extends Model
{

    public function index()
    {
        $continents = Continent::orderBy('name', 'asc')->get();
        $complaints = Customer_complaint::join('customers', 'customers.id', '=', 'customer_complaints.customer_id')
                                        ->select('customer_complaints.*', 'customers.email as email', 'customers.contact_number as contact_number')
                                        ->orderBy('customer_complaints.id', 'asc')->get();

        return view('dashboard.customer_complaints', compact('complaints', 'continents'));
    }

    public function registerComplain()
    {
        $customer = Customer::select('id')->where('email', request('email'))->get();

        $customer_id = null;
        foreach ($customer as $value) {
            $customer_id = $value->id;
        }

        if(!$customer_id)
            session()->flash('exception', "Error: " . "Sorry! Please enter your registerd email.");
        else {
            Customer_complaint::create(['name' => request('name'), 'customer_id' => $customer_id, 'complain' => request('complain')]);
            session()->flash('message', "Yor complaint has been registered successfully.");
        }

        return back();
    }
}
