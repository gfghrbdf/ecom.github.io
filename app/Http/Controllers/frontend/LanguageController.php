<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function english(){

        Session()->get('language');

        Session()->forget('language');

        Session()->put('language','english');

        return redirect()->back();


    }

     public function hindi(){

        Session()->get('language');
        Session()->forget('language');

         Session()->put('language','hindi');

        return redirect()->back();

        
    }



}
