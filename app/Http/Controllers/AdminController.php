<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageItem(){
        return view('admin/manage-item');
    }

    public function addItem(){

    }
}
