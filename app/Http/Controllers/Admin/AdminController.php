<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\LienHeMailer;

class AdminController extends Controller
{
    function dashboard(){
        return view('admin.dashboard');
    }
    function lienHe(){
        return view('admin.lienhe.lienhe');
    }
    function guiMaiTuLienHe(Request $request){
        $input = $request->all();
        Mail::to('tranvanhoa15042000@gmail.com')
            ->send(new LienHeMailer($input));
    }
}
