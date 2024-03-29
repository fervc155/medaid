<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Patient;
use App\Privileges;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/wizard';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|max:20',
            'sex' => 'required|string|max:1',
            'image' => 'nullable|file',
            'password' => 'required|string|min:6|confirmed',
            'birthdate'=>'required|date',

            'curp' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        'postalCode' => 'required|integer|max:999999',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
 
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
        $patient = new Patient();

        $patient->curp = $data['curp'];
        $patient->address = $data['address'];
        $patient->postalCode = $data['postalCode'];
        $patient->city = $data['city'];
        $patient->country = $data['country'];
    
        


        $patient->save();

        if(isset($data['image']))
            $ruta_imagen =  $data['image']->store('patients','public');
    
         $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'sex' => strtolower($data['sex']),
            'birthdate' => $data['birthdate'],
            'image' => $ruta_imagen??null,
            'id_privileges' => Privileges::Id('patient'),
            'id_user'=>$patient->dni,
            'password' => Hash::make($data['password']),
        ]);


         $user->createAsStripeCustomer();
         return $user;

    }
}
