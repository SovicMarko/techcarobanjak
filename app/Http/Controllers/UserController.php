<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index(){
        $korisnici = DB::table('users')->get();
        return view('korisnici.prikazKorisnika')->with('korisnici', $korisnici);
    }
}
