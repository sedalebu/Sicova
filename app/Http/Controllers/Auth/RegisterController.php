<?php

namespace sicova\Http\Controllers\Auth;

use sicova\User;
use sicova\Http\Controllers\Controller;
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
            'tipo_documento'=>'required|string|max:255',
            'documento' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'last_name'=>'required|max:255',
            'genero' => 'required|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        return User::create([
            'tp_user'=>'1',
            'estado'=>'1',
            'tipo_documento'=>$data['tipo_documento'],
            'documento'=>$data['documento'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'genero'=>$data['genero'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
