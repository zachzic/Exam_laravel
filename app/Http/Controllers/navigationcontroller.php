<?php

namespace App\Http\Controllers;
use App\Models\acces;
use App\Models\attribution;
use App\Models\module;
use App\Models\groupe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class navigationcontroller extends Controller
{
    public function index()
    {
        $attrib=attribution::all()->where('User_id','=',Auth::user()->id)->first();
        $grp=$attrib->Groupe_id;
        $access=acces::all()->where('id_groupe','=',$grp);
        return view('back.pages.nav',compact('access'));
    }
}
