<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

                //RANDOM ID GENERATOR
                function GeraHash($qtd){
                    //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
                    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
                    $QuantidadeCaracteres = strlen($Caracteres);
                    $QuantidadeCaracteres--;
                    
                    $Hash=NULL;
                        for($x=1; $x<=$qtd; $x++){
                            $Posicao = rand(0,$QuantidadeCaracteres);
                            $Hash .= substr($Caracteres,$Posicao,1);
                        }
                    
                    return $Hash;
                    }
                    
                    //Here you specify how many characters the returning string must have
                    $pid_user =  'USR'.GeraHash(5).time();
                    
                    //default each users role to subscriber
                    $role = 'customer';
        
                    //remove spaces in string and convert to underscore
                    //$friendly_name = str_replace(' ', '_', strtolower($data['friendly_name']));

        return User::create([
            'pid_user' => $pid_user,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'company_name' => $data['company_name'],
            'company_address' => 'NA',
            'company_phone' => 'NA',
            'role' => $role,
            'cid_status' => 'NA',
            'login_status' => 'NA',
            'image_name' => 'NA',
            'image_ext' => 'NA',
            'ext1' => 'NA',
            'password' => Hash::make($data['password']),
        ]);
    }
}
