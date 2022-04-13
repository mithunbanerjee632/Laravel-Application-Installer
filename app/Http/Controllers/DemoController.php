<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DemoController extends Controller
{
    function MakeMigration(){
      Artisan::call('make:migration my_table');
    }

    function RunMigration(){
     Artisan::call('migrate');
    }

    function AppCacheClear(){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

    }
}
