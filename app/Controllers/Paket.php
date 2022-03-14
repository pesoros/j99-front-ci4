<?php

namespace App\Controllers;

class Paket extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('paket/index',$ldata);
    }  
}
