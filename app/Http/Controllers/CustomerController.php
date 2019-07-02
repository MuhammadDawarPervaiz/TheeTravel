<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Continent;
use App\Customer_documents;

class CustomerController extends Controller
{
    public $activeClass;

    public function __construct()
    {
        $this->middleware('auth:customer');
        $this->activeClass = array('dashoboardActive' => null, 'profileActive' => null, 'complaintActive' => null, 'docsActive' => null, 'viewDocsActive' => null);
    }

    public function index()
    {
        $continents = Continent::orderBy('name', 'asc')->get();
        $this->activeClass['dashoboardActive'] = "active";
        $sideNavClass = $this->activeClass;
        return view('customer.dashboard', compact('continents', 'sideNavClass'));
    }

    public function showProfileForm(RegisterController $obj_RegController)
    {
        $continents = Continent::orderBy('name', 'asc')->get();
        $customerData = $this->getCustomerData();

        $genders = $obj_RegController->genders;
        $countries = $obj_RegController->countries;

        $this->activeClass['profileActive'] = "active";
        $sideNavClass = $this->activeClass;

        return view('customer.profileForm', compact('continents', 'customerData', 'genders', 'countries', 'sideNavClass'));
    }
    public function update(Customer $obj_customer)
    {
        $messages = [
          'regex' => 'Special characters and digits are not allowed.',
        ];

        $this->validate(request(), [
            'first_name' => 'nullable|string|max:255|regex:/(^[A-Za-z ]+$)+/',
            'last_name' => 'nullable|string|max:255|regex:/(^[A-Za-z ]+$)+/',
            'gender' => 'nullable|string|regex:/(^[A-Za-z]+$)+/',
            'dob' => 'nullable|date',
            'contact_number' => 'nullable|numeric|digits_between:4,15',
            'email' => 'nullable|string|email|max:255|unique:customers',
            'password' => 'nullable|string|min:6|confirmed',
            'skype_id' => 'nullable|string|max:255',
            'facebook_id' => 'nullable|string|max:255',
            'current_country' => 'nullable|string',
            'permanent_residence' => 'nullable|string|max:255',
        ], $messages);

        return $obj_customer->updateCustomer();
    }

    public function showComplaintForm()
    {
        $continents = Continent::orderBy('name', 'asc')->get();

        $this->activeClass['complaintActive'] = "active";
        $sideNavClass = $this->activeClass;
        $customerData = $this->getCustomerData();

        return view('customer.complaintForm', compact('continents', 'sideNavClass', 'customerData'));
    }

    public function showDocumentForm()
    {
        $continents = Continent::orderBy('name', 'asc')->get();

        $this->activeClass['docsActive'] = "active";
        $sideNavClass = $this->activeClass;

        return view('customer.documentForm', compact('continents', 'sideNavClass'));
    }

    public function showDocuments()
    {
        $continents = Continent::orderBy('name', 'asc')->get();

        $documents = Customer_documents::join('customers', 'customer_documents.customer_id', '=', 'customers.id')
                                        ->select('customer_documents.*')
                                        ->where('customers.email', session('currentUserEmail'))
                                        ->get();

        $this->activeClass['viewDocsActive'] = "active";
        $sideNavClass = $this->activeClass;

        return view('customer.viewDocs', compact('continents', 'sideNavClass', 'documents'));
    }

    public function getCustomerData()
    {
          $customer = Customer::where('email', session('currentUserEmail'))->get();
          foreach ($customer as $value) {
                $firstName = $value->first_name;
                $lastName = $value->last_name;
                $dob = $value->dob;
                $gender = $value->gender;
                $contact_number = $value->contact_number;
                $email = $value->email;
                $skype_id = $value->skype_id;
                $facebook_id = $value->facebook_id;
                $current_country = $value->current_country;
                $permanent_residence = $value->permanent_residence;
          }

          return $customerData = array('email' => $email,
                                      'firstName' => $firstName,
                                      'lastName' => $lastName,
                                      'dob' => $dob,
                                      'gender' => $gender,
                                      'contact_number' => $contact_number,
                                      'skype_id' => $skype_id,
                                      'facebook_id' => $facebook_id,
                                      'current_country' => $current_country,
                                      'permanent_residence' => $permanent_residence);
    }
}
