<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'lastname' => 'required|string|max:255',
            'phone' => 'required|numeric|unique:users',
            'mobile_money_phone' => 'required|numeric|unique:clients',
            'mobile_money_name' => 'required|string|unique:clients',
            'firstname' => 'required|string|max:255',
            'gender' => 'required',

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:7|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $name=$data['firstname']." ".$data['lastname'];
        $user=User::create([
            'name' => $name,
            'role' => "user",
            'email' => $data['email'],
            'phone' => $data['phone'],
            'confirmed' => 1,
            'password' => bcrypt($data['password']),
        ]);


        $model=new Models\ClientModel();
        $model->firstname=$data['firstname'];
        $model->lastname=$data['lastname'];
        $model->gender=$data['gender'];
        $model->phone=$data['phone'];
        $model->address=$data['address'];
        $model->email=$data['email'];
        $model->mobile_money_name=$data['mobile_money_name'];
        $model->mobile_money_phone=$data['mobile_money_phone'];
        $model->user_id=$user->id;
        //$model->save();
        $user->clientDetails()->save($model);

        return $user;

    }
}
