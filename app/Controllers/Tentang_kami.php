<?php

namespace App\Controllers;

class Tentang_kami extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer2'); 
        return view('tentang_kami/index',$ldata);
    }  
}
