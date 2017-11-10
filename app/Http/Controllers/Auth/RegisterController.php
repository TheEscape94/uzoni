<?php

namespace App\Http\Controllers\Auth;

use App\CompanyDetail;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        if(isset($data['is_company'])){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'lname' => 'required|max:255',
                'town' => 'required|numeric',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'password_repeat' => 'required|min:6|same:password',
                'zip' => 'required',
                'address' => 'required',
                'company_name' => 'required',
                'category' => 'required',
                'phone' => 'required'
            ]);
        }else{
            return Validator::make($data, [
                'name' => 'required|max:255',
                'lname' => 'required|max:255',
                'town' => 'required|numeric',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'password_repeat' => 'required|min:6|same:password',
            ]);
        }
    }

    protected function create(array $data)
    {
        if(isset($data['is_company'])){
            $user = new User;
            $user->name = $data['name'];
            $user->lname = $data['lname'];
            $user->town = $data['town'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->is_company = 1;
            $user->zip = $data['zip'];
            $user->address = $data['address'];
            $user->fax = $data['fax'];
            $user->phone = $data['phone'];
            $user->save();

            $companyDetail = new CompanyDetail;
            $companyDetail->company_name = $data['company_name'];
            $companyDetail->has_subscription = 3;
            $companyDetail->user()->associate($user);
            $companyDetail->save();

            return $user;
        }

        return User::create([
            'name' => $data['name'],
            'lname' => $data['lname'],
            'town' => $data['town'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_company' => 0
        ]);
    }
}
