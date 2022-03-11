<?php

namespace App\Controllers;

class Fasilitas extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer2'); 
        return view('fasilitas/index',$ldata);
    }  
}
