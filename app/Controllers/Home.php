<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('home/index',$ldata);
    }  
}
