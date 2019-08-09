<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fec_nac' => ['required', 'date'],
            'doc_tipo' => ['required'],
            'documento' =>  ['required', 'int', 'min:8'],
            'domicilio' =>['required', 'string', 'min:10', 'max:255'],
            'telefono' =>['required', 'int'],
            'sexo' => ['required']
            'role' => ['required','in:admin,customer'],
         ],
          [
            "string"=> "El campo :attribute debe ser un texto",
            "min"=>"El campo :attribute tiene un minimo de :min",
            "max"=>"El campo :attribute tiene un minimo de :max",
            "date"=> "El campo :attribute debe ser una fecha",
            "numeric"=> "El campo :attribute debe ser un numero",
            "integer"=> "El campo :attribute debe ser un numero entero",
            "unique"=> "El campo :attribute se encuentra repetido",
            "required"=>"El campo :attribute debe ser obligarorio",
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
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fec_nac' => $data['fec_nac'],
            'doc_tipo' => $data['doc_tipo'],
            'documento' => $data['documento'],
            'domicilio' => $data['domicilio'],
            'telefono' => $data['telefono'],
            'sexo' => $data['sexo'],
            'role' => $data['role']

        ]);
}

}
