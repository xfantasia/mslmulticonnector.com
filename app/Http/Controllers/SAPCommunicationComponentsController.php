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


class SAPCommunicationComponentsController extends Controller
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

        $sap_communication_components = DB::table('sap_communication_components')
            ->join('sap_communication_arrangements', 'sap_communication_components.pid_ca', '=', 'sap_communication_arrangements.pid_ca')
            ->select('*','sap_communication_arrangements.ca_name as ca_namex')
            ->where('sap_communication_components.pid_user', '=', $pid_user)
            ->get(); 

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get(); 


        //ARRAY DATA COLLECTION
        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_components'] = $sap_communication_components;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;


        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_communication_components_read', $data);

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

        $sap_communication_components = DB::table('sap_communication_components')
            ->join('sap_communication_arrangements', 'sap_communication_components.pid_ca', '=', 'sap_communication_arrangements.pid_ca')
            ->select('*','sap_communication_arrangements.ca_name as ca_namex')
            ->where('sap_communication_components.pid_user', '=', $pid_user)
            ->get(); 

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get(); 


        //ARRAY DATA COLLECTION
        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_components'] = $sap_communication_components;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;
        

        //\Session::flash('success', 'WebHR-Configuration was successfully created!');
        return view('pages/sap_communication_components_create', $data);
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

        $pid_coco = 'SAPCOCO'.XIScode::xHash(10).time();

        DB::table('sap_communication_components')->insert(
            [
                'pid_coco' => $pid_coco,
                'pid_user' => Auth::user()->pid_user,
                'pid_ca' => $request->pid_ca,
                'pid_fsrv' => 'NA',
                'config_type' => $request->config_type,
                'coco_name' => $request->coco_name,
                'coco_type' => 'NA',
                'financial_services_wsdl_url' => $request->financial_services_wsdl_url,
                'financial_services_sftp_url' => $request->financial_services_wsdl_url,
                'coco_description' => $request->coco_description,
                'coco_status1' => 'NA',
                'coco_status2' => 'NA',
                'coco_ext1' => 'NA',
                'coco_ext2' => 'NA',
                'created_at' => now(),
                'updated_at' => now()
            ]
          );


            $sap_communication_components = DB::table('sap_communication_components')
                ->join('sap_communication_arrangements', 'sap_communication_components.pid_ca', '=', 'sap_communication_arrangements.pid_ca')
                ->select('*','sap_communication_arrangements.ca_name as ca_namex')
                ->where('sap_communication_components.pid_user', '=', $pid_user)
                ->get(); 

            $sap_communication_arrangements = DB::table('sap_communication_arrangements')
                ->where('pid_user', '=', $pid_user)
                ->get(); 


            //ARRAY DATA COLLECTION
            $data = array();
            $data['company_name'] = Auth::user()->company_name;
            $data['sap_communication_components'] = $sap_communication_components;
            $data['sap_communication_arrangements'] = $sap_communication_arrangements;
            $data['company_name'] = Auth::user()->company_name;

            \Session::flash('success', 'SAP Communication Components was successfully created!');
            return view('pages/sap_communication_components_read', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sap_communication_components)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_communication_components = DB::table('sap_communication_components')
            ->join('sap_communication_arrangements', 'sap_communication_components.pid_ca', '=', 'sap_communication_arrangements.pid_ca')
            ->select('*','sap_communication_arrangements.ca_name as ca_namex')
            ->where('sap_communication_components.pid_user', '=', $pid_user)
            ->get(); 

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //ARRAY DATA COLLECTION
        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_components'] = $sap_communication_components;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;
        $data['company_name'] = Auth::user()->company_name;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_communication_components_details', $data);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sap_communication_components)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //LOAD RECORDS INTO ARRAY
        $sap_communication_components = DB::table('sap_communication_components')
            ->join('sap_communication_arrangements', 'sap_communication_components.pid_ca', '=', 'sap_communication_arrangements.pid_ca')
            ->select('*','sap_communication_arrangements.ca_name as ca_namex')
            ->where('sap_communication_components.pid_user', '=', $pid_user)
            ->where('sap_communication_components.pid_coco', '=', $sap_communication_components)
            ->get(); 


        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get(); 


        //ARRAY DATA COLLECTION
        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_components'] = $sap_communication_components;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;

        //\Session::flash('success', 'Configuration was succesfully deleted');
        return view('pages/sap_communication_components_update', $data);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sap_communication_components)
    {

        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //UPDATE
        DB::table('sap_communication_components')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_coco', '=', $sap_communication_components)
            ->update([
                'pid_ca' => $request->pid_ca,
                'config_type' => $request->config_type,
                'coco_name' => $request->coco_name,
                'financial_services_wsdl_url' => $request->financial_services_wsdl_url,
                'financial_services_sftp_url' => $request->financial_services_wsdl_url,
                'coco_description' => $request->coco_description,
                'updated_at' => now()
                ]);


        //TABLE VIEW DATA
        $sap_communication_components = DB::table('sap_communication_components')
            ->join('sap_communication_arrangements', 'sap_communication_components.pid_ca', '=', 'sap_communication_arrangements.pid_ca')
            ->select('*','sap_communication_arrangements.ca_name as ca_namex')
            ->where('sap_communication_components.pid_user', '=', $pid_user)
            ->get(); 

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //ARRAY DATA COLLECTION
        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_components'] = $sap_communication_components;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;


        \Session::flash('success', 'Communication Component was succesfully Updated');
        return view('pages/sap_communication_components_read', $data);
    }



    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sap_communication_components)
    {
        //META DATA 
        $data = array();
        $pid_user = Auth::user()->pid_user;

        //DELETE
        DB::table('sap_communication_components')
            ->where('pid_user', '=', $pid_user)
            ->where('pid_coco', '=', $sap_communication_components)
            ->delete();


        //TABLE VIEW DATA
        $sap_communication_components = DB::table('sap_communication_components')
            ->join('sap_communication_arrangements', 'sap_communication_components.pid_ca', '=', 'sap_communication_arrangements.pid_ca')
            ->select('*','sap_communication_arrangements.ca_name as ca_namex')
            ->where('sap_communication_components.pid_user', '=', $pid_user)
            ->get(); 

        $sap_communication_arrangements = DB::table('sap_communication_arrangements')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        $sap_financial_services = DB::table('sap_financial_services')
            ->where('pid_user', '=', $pid_user)
            ->get(); 

        //ARRAY DATA COLLECTION
        $data = array();
        $data['company_name'] = Auth::user()->company_name;
        $data['sap_communication_components'] = $sap_communication_components;
        $data['sap_communication_arrangements'] = $sap_communication_arrangements;


        \Session::flash('success', 'Communication Components was succesfully deleted');
        return view('pages/sap_communication_components_read', $data);
    }


}
