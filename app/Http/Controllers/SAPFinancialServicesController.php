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


class SAPFinancialServicesController extends Controller
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

        $sap_financial_services = DB::table('sap_financial_services')
            ->join('sap_financial_systems', 'sap_financial_services.pid_fsys', '=', 'sap_financial_systems.pid_fsys')
            ->select('*','sap_financial_systems.fsys_name as fsys_namex')
            ->where('sap_financial_services.pid_user', '=', $pid_user)
            ->get(); 

        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_services'] = $sap_financial_services;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_financial_services_read', $data);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        //create form
        $pid_user = Auth::user()->pid_user;
        $data = array();

        $sap_financial_systems = DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_systems'] = $sap_financial_systems;
        

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_financial_services_create', $data);
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

        $pid_fsrv = 'SAPFSRV'.XIScode::xHash(10).time();

        DB::table('sap_financial_services')->insert(
            [
                'pid_fsrv' => $pid_fsrv,
                'pid_fsys' => $request->pid_fsys,
                'pid_user' => Auth::user()->pid_user,
                'config_type' => 'NA',
                'fsrv_name' => $request->fsrv_name,
                'fsrv_api_endpoint' => $request->fsrv_api_endpoint,
                'fsrv_description' => $request->fsrv_description,
                'fsrv_status1' => 'NA', 
                'fsrv_status2' => 'NA',
                'fsrv_ext1' => 'NA', 
                'fsrv_ext2' => 'NA',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


            $sap_financial_services = DB::table('sap_financial_services')
                ->where('pid_user', '=', $pid_user)
                ->get(); 

            //DATA FOR VIEW
            $data['sap_financial_services'] = $sap_financial_services;
            $data['company_name'] = Auth::user()->company_name;

            \Session::flash('success', 'SAP Financial Service was successfully created!');
            return view('pages/sap_financial_services_read', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sap_financial_services)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_financial_services = DB::table('sap_financial_services')
            ->join('sap_financial_systems', 'sap_financial_services.pid_fsys', '=', 'sap_financial_systems.pid_fsys')
            ->select('*')
            ->where('sap_financial_services.pid_user', '=', $pid_user)
            ->where('sap_financial_services.pid_fsrv', '=', $sap_financial_services)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_services'] = $sap_financial_services;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_financial_services_details', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sap_financial_services)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_financial_services = DB::table('sap_financial_services')
            ->join('sap_financial_systems', 'sap_financial_services.pid_fsys', '=', 'sap_financial_systems.pid_fsys')
            ->select('*')
            ->where('sap_financial_services.pid_user', '=', $pid_user)
            ->where('sap_financial_services.pid_fsrv', '=', $sap_financial_services)
            ->get(); 

        $sap_financial_systems = DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_services'] = $sap_financial_services;
        $data['sap_financial_systems'] = $sap_financial_systems;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_financial_services_update', $data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sap_financial_services)
    {

        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //UPDATE
        DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_fsrv', '=', $sap_financial_services)
            ->update([
                'pid_fsys' => $request->pid_fsys,
                'fsrv_name' => $request->fsrv_name,
                'fsrv_api_endpoint' => $request->fsrv_api_endpoint,
                'fsrv_description' => $request->fsrv_description,
                'updated_at' => now()
                ]);


        //TABLE VIEW DATA
        //LOAD RECORDS INTO ARRAY
        $sap_financial_services = DB::table('sap_financial_services')
            ->join('sap_financial_systems', 'sap_financial_services.pid_fsys', '=', 'sap_financial_systems.pid_fsys')
            ->select('*','sap_financial_systems.fsys_name as fsys_namex')
            ->where('sap_financial_services.pid_user', '=', $pid_user)
            ->get(); 
            
        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_services'] = $sap_financial_services;

        \Session::flash('success', 'Financial Service was succesfully Updated');
        return view('pages/sap_financial_services_read', $data);
    }



    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sap_financial_services)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //DELETE
        DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_fsrv', '=', $sap_financial_services)
            ->delete();


        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_services'] = $sap_financial_services;

        \Session::flash('success', 'Financial Service was succesfully deleted');
        return view('pages/sap_financial_services_read', $data);
    }


}
