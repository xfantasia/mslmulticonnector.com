<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class ConfigMSMCController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index_config_web_hr()
    {
        return view('pages/config_web_hr');
    }


    public function index_config_sap()
    {
        return view('pages/config_sap');
    }




////////////////// CLASS ENDS //////////////////
}
