<?php

namespace App\Http\Controllers;

use App\Models\WebhrPayrollsModel;
use Exception;
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

class WebHRPayrollConfigController extends Controller
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
        return view('pages/webhr_payroll_config_view', $data);
        //return redirect()->route('webhr_payroll_config.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        //create form
        $data = array();
        $data['company_name'] = Auth::user()->company_name;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/webhr_payroll_config', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        dd("HELLO");
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        $pid_config = 'WHRPR'.XIScode::xHash(10).time();

        DB::table('webhr_payroll_config')->insert(
            [
                'pid_config' => $pid_config,
                'pid_user' => Auth::user()->pid_user,
                'config_name' => $request->config_name,
                'api_name' => $request->api_name,
                'config_type' => $request->config_type,
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
            return view('pages/webhr_payroll_config_view', $data);
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
        return view('pages/webhr_payroll_config_show', $data);
        
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
        return view('pages/webhr_payroll_config_edit', $data);
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
        return view('pages/webhr_payroll_config_view', $data);
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
        return view('pages/webhr_payroll_config_view', $data);
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

        //create form
        $data = array();
        $data['company_name'] = Auth::user()->company_name;

        $webhr_payroll_config = DB::table('webhr_payroll_config')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $data['company_name'] = Auth::user()->company_name;
        $data['webhr_payroll_config'] = $webhr_payroll_config;

                //HTTP GET RESPONSE
                try {
                    $response = Http::withToken($token)->get($url.$pre_param.$params);
                    //dd('SUCCESS : '.$response->status().' : '.$response);
                    //$json = file_get_contents($response);
                    $objs = json_decode($response,true);

                    $pid_payroll = 'WHRPAYROLL'.XIScode::xHash(10).time();
                    
                    foreach($objs as $row)
                    {

                        WebhrPayrollsModel::create([
                                            'pid_payroll'       => $pid_payroll,
                                            'company_name'      => $row["CompanyName"],
                                            'station_name'      => $row["StationName"],
                                            'division_name'     => $row["DivisionName"],
                                            'username'          => $row["UserName"],
                                            'first_name'        => $row["FirstName"],
                                            'last_name'         => $row["LastName"],
                                            'total_salary'      => $row["TotalSalary"],
                                            'salary_date '      => $row["SalaryDate"],
                                            'salary_period_start_date'     => $row["SalaryPeriod_StartDate"],
                                            'salary_period_end_date'      => $row["SalaryPeriod_EndDate"],
                        ]);
                
                    }
                    dd("WEB-HR DATA UPDATE SUCCESSFUL!");
                    

                } 
            catch (Exception $e) {
                    //echo 'and the error is: ',  $e->getMessage(), "\n";
                    \Session::flash('failed', 'A Connection Error has occured! Check that your API URL and Parameters are correct.');
                    return view('pages/webhr_payroll_config_view', $data);
                    exit;
                }

                dd('FAILED!');
                //RESPONSE
                if($response->status() == 200){
                    \Session::flash('success', 'Connection SUCCESSFUL! Status: 200 : OK WebHR-Configuration Test was Successful.');
                    $data['status'] = 200;
                }else{
                    \Session::flash('failed', 'Connection FAILED! Connection to WEB-HR :: WebHR-Configuration Test Failed.');
                    $data['status'] = 400;
                }

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        //return view('pages/webhr_payroll_config_view', $data);
        return redirect()->back();
    }
}
