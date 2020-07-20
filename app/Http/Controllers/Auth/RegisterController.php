<?php

namespace App\Http\Controllers\Auth;

use App\Viviendas;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required','min:2', 'max:30', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'min:2', 'max:30', 'string'],
            'telefono' => ['required', 'integer'],
            'fecha_nacimiento' => ['required','date'],
            'rut' =>[  'required',
                            'string',
                            'max:20',
                            'unique:users',
                            function ($attribute, $value, $fail) {
                                $validarRut = $this->valida_rut($value);
                                if(!$validarRut){
                                    $fail('Ingrese un rut válido.');
                                }
                            },
                    ]
        ],
        [
            'name.required' => 'Debe ingresar su nombre ',
            'apellido.required' => 'Debe ingresar un apellido',
            'email.required' => 'Debe ingresar su e-mail',
            'rut.required' => 'Debe ingresar un RUT',
            'password.required' => 'Debe ingresar su contraseña',
            'password.min' => 'La contraseña debe tener minimo 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'telefono.required' => 'Debe ingresar un telefono de contacto',
            'telefono.integer' => 'Debe ingresar un numero valido ej: 56953320487',
            'username.required' => 'Debe ingresar un nombre de usuario',
            'fecha_nacimiento.required' => 'Debe ingresar una fecha de nacimiento'
        ]);      
                 
    }

    
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'apellido'  => $data['apellido'],            
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'telefono'=> $data['telefono'],
            'rut'   => $data['rut'],
            'fecha_nacimiento' => Carbon::parse($data['fecha_nacimiento'])->format('Y-m-d'),
            'vivienda_id' => 1,
            'estado' => 3,
        ]);
        $user->assignRole([4]);
        return $user;
    }

    public function valida_rut($rut)
    {
        try{
            $rut = preg_replace('/[^k0-9]/i', '', $rut);
            $dv  = substr($rut, -1);
            $numero = substr($rut, 0, strlen($rut)-1);
            $i = 2;
            $suma = 0;
            foreach(array_reverse(str_split($numero)) as $v)
            {
                if($i==8)
                    $i = 2;

                $suma += $v * $i;
                ++$i;
            }
            $dvr = 11 - ($suma % 11);
            
            if($dvr == 11)
                $dvr = 0;
            if($dvr == 10)
                $dvr = 'K';
            if($dvr == strtoupper($dv))
                return true;
            else
                return false;
        }catch(Exception $e){
            return false;
        }
    } 
}
