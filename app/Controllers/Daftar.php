<?php

namespace App\Controllers;

class Daftar extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('daftar/index',$ldata);
    } 
    public function add()
    {
        return 'success';
    } 
}
