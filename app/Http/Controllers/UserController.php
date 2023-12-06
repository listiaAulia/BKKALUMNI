<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
class UserController extends Controller
{
    //
    function landingpage(){
        $data['lowongan'] = Lowongan::all();
        return view ('landingpage.index',$data);
    }

    function lowongan(){
        $data['lowongan'] = Lowongan::all();
        return view('landingpage.pricing', $data);
    }
    }
