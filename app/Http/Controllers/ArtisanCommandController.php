<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Validator;

class ArtisanCommandController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function xmigrate()
    {
            $exitCode = Artisan::call('migrate:refresh', ['--force' => true,]);
            dd('Migration Successful! No:'.rand());
    }

    public function clear_cache()
    {
            $exitCode = Artisan::call('migrate:refresh', ['--force' => true,]);
            dd('Cache Clear Successful! No:'.rand());
    }



////////////////// CLASS ENDS //////////////////
}
