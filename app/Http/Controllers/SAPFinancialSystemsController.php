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


class SAPFinancialSystemsController extends Controller
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

        $sap_financial_systems = DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_systems'] = $sap_financial_systems;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_financial_systems_read', $data);

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
        $data['company_name'] = Auth::user()->company_name;

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_financial_systems_create')->with($data);
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

        $pid_fsys = 'SAPFSYS'.XIScode::xHash(10).time();

        DB::table('sap_financial_systems')->insert(
            [
                'pid_fsys' => $pid_fsys,
                'pid_user' => Auth::user()->pid_user,
                'config_type' => 'NA',
                'fsys_name' => $request->fsys_name,
                'fsys_description' => $request->fsys_description,
                'fsys_status1' => 'NA',
                'fsys_status2' => 'NA', 
                'fsys_ext1' => 'NA',
                'fsys_ext2' => 'NA',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


            $sap_financial_systems = DB::table('sap_financial_systems')
                ->where('pid_user', '=', $pid_user)
                ->get(); 

            //DATA FOR VIEW
            $data['sap_financial_systems'] = $sap_financial_systems;
            $data['company_name'] = Auth::user()->company_name;

            \Session::flash('success', 'SAP Financial System was successfully created!');
            return view('pages/sap_financial_systems_read', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sap_financial_systems)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_financial_systems = DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_fsys', '=', $sap_financial_systems)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_systems'] = $sap_financial_systems;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_financial_systems_details', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sap_financial_systems)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_financial_systems = DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_fsys', '=', $sap_financial_systems)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_systems'] = $sap_financial_systems;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_financial_systems_update', $data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sap_financial_systems)
    {

        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //UPDATE
        DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_fsys', '=', $sap_financial_systems)
            ->update([
                'fsys_name' => $request->fsys_name,
                'fsys_description' => $request->fsys_description,
                'updated_at' => now()
                ]);


        //TABLE VIEW DATA
        $sap_financial_systems = DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_systems'] = $sap_financial_systems;

        \Session::flash('success', 'Configuration was succesfully Updated');
        return view('pages/sap_financial_systems_read', $data);
    }



    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sap_financial_systems)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //DELETE
        DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_fsys', '=', $sap_financial_systems)
            ->delete();


        $sap_financial_systems = DB::table('sap_financial_systems')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //DATA FOR VIEW
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_financial_systems'] = $sap_financial_systems;

        \Session::flash('success', 'Financial System was succesfully deleted');
        return view('pages/sap_financial_systems_read', $data);
    }


}
