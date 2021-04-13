<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\DATAbox;
use App\Http\Controllers\FINBOX;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

class SAPCommunicationSystemController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //home
        $pid_user = Auth::user()->pid_user;

        $webhr_payroll_config = DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['webhr_payroll_config'] = $webhr_payroll_config;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/webhr_payroll_config_view')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { dd('WORKING OK!');
        //create form
        $data = array();
        $data['company_name'] = Auth::user()->company_name;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/webhr_payroll_config')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        $pid_config = XIScode::xHash(10).time();

        DB::table('webhr_payroll_config')->insert(
            [
                'pid_config' => $pid_config,
                'pid_user' => Auth::user()->pid_user,
                'config_type' => $request->config_type,
                'config_name' => $request->config_name,
                'api_name' => $request->api_name,
                'get_url' => $request->get_url, 
                'api_access_key' => $request->api_access_key,
                'api_secret_key' => $request->api_secret_key,
                'authorization_code' => $request->authorization_code,
                'scope' => $request->scope,
                'ext1' => 'NA',
                'ext2' => 'NA',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


            $webhr_payroll_config = DB::table('webhr_payroll_config')
                ->where('pid_user', '=', $pid_user)
                ->get(); 

            //DATA FOR VIEW
            $data['webhr_payroll_config'] = $webhr_payroll_config;
            $data['company_name'] = Auth::user()->company_name;

            \Session::flash('success', 'WebHR-Configuration was successfully created!');
            return view('pages/webhr_payroll_config_view')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($webhr_payroll_config)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $webhr_payroll_config = DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_config', '=', $webhr_payroll_config)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['webhr_payroll_config'] = $webhr_payroll_config;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/webhr_payroll_config_show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($webhr_payroll_config)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $webhr_payroll_config = DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_config', '=', $webhr_payroll_config)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['webhr_payroll_config'] = $webhr_payroll_config;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/webhr_payroll_config_edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $webhr_payroll_config)
    {
        //
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //UPDATE
        DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_config', '=', $webhr_payroll_config)
            ->update([
                'config_name' => $request->config_name,
                'api_name' => $request->api_name,
                'config_type' => $request->config_type,
                'get_url' => $request->get_url, 
                'api_access_key' => $request->api_access_key,
                'api_secret_key' => $request->api_secret_key,
                'authorization_code' => $request->authorization_code,
                'scope' => $request->scope,
                'updated_at' => now()
                ]);


        //TABLE VIEW DATA
        $webhr_payroll_config = DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['webhr_payroll_config'] = $webhr_payroll_config;

        \Session::flash('success', 'Configuration was succesfully Updated');
        return view('pages/webhr_payroll_config_view')->with($data);
    }



    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($webhr_payroll_config)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //DELETE
        DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_config', '=', $webhr_payroll_config)
            ->delete();


        $webhr_payroll_config = DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['webhr_payroll_config'] = $webhr_payroll_config;

        \Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/webhr_payroll_config_view')->with($data);
    }




    //TEST WEBHR PAYROLL CONFIG
    public function payroll_config_test(Request $request)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //config
        $pid_config = $request->pid_config;

        //config details
        $get_url = DB::table('webhr_payroll_config')
            ->where('pid_user', $pid_user)
            ->where('pid_config', $pid_config)
            ->value('get_url');

        $authorization_code = DB::table('webhr_payroll_config')
            ->where('pid_user', $pid_user)
            ->where('pid_config', $pid_config)
            ->value('authorization_code');


        //HTTP GET REQUEST
        $token = $authorization_code;
        $url = $get_url;
        $pre_param = '?module=Payroll&submodule=Payslips&request=List&';
        $params = 'params={"PayslipStartMonth": "01", "PayslipStartYear": "2021", "PayslipEndMonth": "12","PayslipEndYear": "2021", "Company": "AGPC", "Division": "", "Station": "Lagos"}';


        //HTTP GET RESPONSE
        $response = Http::withToken($token)->get($url.$pre_param.$params);


        //create form
        $data = array();
        $data['company_name'] = Auth::user()->company_name;

        if($response->status() == 200){
            \Session::flash('success', 'Connection SUCCESSFUL! Status: 200 : OK WebHR-Configuration Test was Successful.');
            $data['status'] = 200;
        }else{
            \Session::flash('failed', 'Connection FAILED! Connection to WEB-HR :: WebHR-Configuration Test Failed.');
            $data['status'] = 400;
        }

        $webhr_payroll_config = DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $data['company_name'] = Auth::user()->company_name;
        $data['webhr_payroll_config'] = $webhr_payroll_config;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/webhr_payroll_config_view')->with($data);
    }
}
