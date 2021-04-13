<?php
namespace App\Forms;
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class ConfigWebHRController extends Controller
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
    public function index()
    {
        return view('pages/config_webhr');
    }

    public function index_edit()
    {
        return view('pages/config_webhr_edit');
    }

    public function index_view()
    {
        return view('pages/config_webhr_view');
    }

    public function index_details()
    {
        return view('pages/config_webhr_details');
    }


////////////////// CLASS ENDS //////////////////
}
