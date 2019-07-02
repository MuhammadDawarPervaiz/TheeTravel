<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'dob', 'gender', 'contact_number', 'email', 'password', 'skype_id', 'facebook_id', 'current_country', 'permanent_residence',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }

    public function updateCustomer()
    {
        $flag = 0;
        try {
            if(request('first_name')){
                Customer::where('email', session('currentUserEmail'))->update(['first_name' => request('first_name')]);
                $flag = 1;
            }
            if(request('last_name')){
                Customer::where('email', session('currentUserEmail'))->update(['last_name' => request('last_name')]);
                $flag = 1;
            }
            if(request('dob')){
                Customer::where('email', session('currentUserEmail'))->update(['dob' => request('dob')]);
                $flag = 1;
            }
            if(request('gender')){
                Customer::where('email', session('currentUserEmail'))->update(['gender' => request('gender')]);
                $flag = 1;
            }
            if(request('contact_number')){
                Customer::where('email', session('currentUserEmail'))->update(['contact_number' => request('contact_number')]);
                $flag = 1;
            }
            if(request('password')){
                Customer::where('email', session('currentUserEmail'))->update(['password' => bcrypt(request('password'))]);
                $flag = 1;
            }
            if(request('skype_id')){
                Customer::where('email', session('currentUserEmail'))->update(['skype_id' => request('skype_id')]);
                $flag = 1;
            }
            if(request('facebook_id')){
                Customer::where('email', session('currentUserEmail'))->update(['facebook_id' => request('facebook_id')]);
                $flag = 1;
            }
            if(request('current_country')){
                Customer::where('email', session('currentUserEmail'))->update(['current_country' => request('current_country')]);
                $flag = 1;
            }
            if(request('permanent_residence')){
                Customer::where('email', session('currentUserEmail'))->update(['permanent_residence' => request('permanent_residence')]);
                $flag = 1;
            }

            if($flag)
                session()->flash('message', "Congrats! Profile has been updated successfully.");

        } catch (\Illuminate\Database\QueryException $e) {
            session()->flash('exception', "Error: " . "Sorry! Please report this issue to us.");
        }

        return redirect()->route('customer.profile');
    }

    public function view()
    {
      //
    }
}
