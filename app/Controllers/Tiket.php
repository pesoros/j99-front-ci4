<?php

namespace App\Controllers;

class Tiket extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('tiket/index',$ldata);
    }  
    public function detail()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('tiket/detail',$ldata);
    }  
}
