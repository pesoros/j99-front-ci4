<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('kategori/index',$ldata);
    }  
}
