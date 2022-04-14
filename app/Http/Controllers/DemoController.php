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

    function setEnvValue($envKey,$envValue){
       $envFilePath =  app()->environmentFilePath(); // env file location dhorlam
       $StrEnv = file_get_contents($envFilePath); // env file er vitor value k string e convert kora hoice
       $StrEnv .= "\n";
       $keyStartPosition = strpos($StrEnv,"{$envKey}=");
       $keyEndPosition = strpos($StrEnv,"\n",$keyStartPosition);
       $oldLine = substr($StrEnv,$keyStartPosition,$keyEndPosition-$keyStartPosition);

       if(!$keyStartPosition || !$keyEndPosition || !$oldLine){
           $StrEnv.="{$envKey}={$envValue}\n";
       }else{
           $StrEnv = str_replace($oldLine,"{$envKey}={$envValue}",$StrEnv);
       }


       $StrEnv = substr($StrEnv,0,-1); //sobgulo str k guciye ana hoice
       $changeResult = file_put_contents($envFilePath,$StrEnv);

       if(!$changeResult){
         return false;
       }else{
           return true;
       }

    }

    function EnvConfig(){
        $this->setEnvValue("DB_USERNAME","my_user");

        $this->setEnvValue("ON_SIGNAL_API_KEY","123456789");
        $this->setEnvValue("SMS_API_KEY","123456789");
        $this->setEnvValue("SMS_API_USER","123456789");
        $this->setEnvValue("SMS_API_PASS","123456789");
    }
}
