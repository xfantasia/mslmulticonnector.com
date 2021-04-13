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


class SAPCommunicationArrangementsController extends Controller
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

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->join('sap_financial_services', 'sap_communication_arrangements.pid_fsrv', '=', 'sap_financial_services.pid_fsrv')
            ->select('*','sap_financial_services.fsrv_name as fsrv_namex')
            ->where('sap_communication_arrangements.pid_user', '=', $pid_user)
            ->get(); 

        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_communication_arrangements_read', $data);

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

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['sap_financial_services'] = $sap_financial_services;

        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;
        

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_communication_arrangements_create', $data);
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

        $pid_ca = 'SAPCOMMARR'.XIScode::xHash(10).time();

        DB::table('sap_communication_arrangements')->insert(
            [
                'pid_ca' => $pid_ca,
                'pid_fsrv' => $request->pid_fsys,
                'pid_user' => Auth::user()->pid_user,
                'config_type' => $request->config_type,
                'ca_name' => $request->ca_name,
                'ca_type' => 'NA',
                'ca_tenant_url' => $request->ca_tenant_url,
                'ca_description' => $request->ca_description,
                'ca_username' => $request->ca_username,
                'ca_password' =>  $request->ca_password,
                'ca_status1' =>  $request->ca_status1, 
                'ca_status2' =>  $request->ca_status2,
                'ca_ext1' => 'NA',
                'ca_ext2' => 'NA',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


            $sap_communication_arrangements = DB::table('sap_communication_arrangements')
                ->where('pid_user', '=', $pid_user)
                ->get(); 

            //DATA FOR VIEW
            $data['sap_communication_arrangements'] = $sap_communication_arrangements;
            $data['company_name'] = Auth::user()->company_name;

            \Session::flash('success', 'SAP Communication Arrangement was successfully created!');
            return view('pages/sap_communication_arrangements_read', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sap_communication_arrangements)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_ca', '=', $sap_communication_arrangements)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_communication_arrangements_details', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sap_communication_arrangements)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->join('sap_financial_services', 'sap_financial_services.pid_fsrv', '=', 'sap_communication_arrangements.pid_fsrv')
            ->select('*','sap_financial_services.fsrv_name as fsrv_namex')
            ->where('sap_communication_arrangements.pid_user', '=', $pid_user)
            ->where('sap_communication_arrangements.pid_ca', '=', $sap_communication_arrangements)
            ->get(); 

        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get(); 


        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;
        $data['sap_financial_services'] = $sap_financial_services;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_communication_arrangements_update', $data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sap_communication_arrangements)
    {

        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //UPDATE
        DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_ca', '=', $sap_communication_arrangements)
            ->update([
                'pid_fsrv' => $request->pid_fsrv,
                'ca_name' => $request->ca_name,
                'ca_tenant_url' => $request->ca_tenant_url,
                'ca_description' => $request->ca_description,
                'ca_username' => $request->ca_username,
                'ca_password' =>  $request->ca_password,
                'updated_at' => now()
                ]);


        //TABLE VIEW DATA
        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->join('sap_financial_services', 'sap_financial_services.pid_fsrv', '=', 'sap_communication_arrangements.pid_fsrv')
            ->select('*','sap_financial_services.fsrv_name as fsrv_namex')
            ->where('sap_communication_arrangements.pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        \Session::flash('success', 'Communication Arrangement was succesfully Updated');
        return view('pages/sap_communication_arrangements_read', $data);
    }



    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sap_communication_arrangements)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //DELETE
        DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_ca', '=', $sap_communication_arrangements)
            ->delete();


        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->join('sap_financial_services', 'sap_financial_services.pid_fsrv', '=', 'sap_communication_arrangements.pid_fsrv')
            ->select('*','sap_financial_services.fsrv_name as fsrv_namex')
            ->where('sap_communication_arrangements.pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        \Session::flash('success', 'Communication Arrangement was succesfully deleted');
        return view('pages/sap_communication_arrangements_read', $data);
    }


}
