<?php

namespace App\Controllers;

class Reservasi extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('reservasi/index',$ldata);
    }

    public function isidata()
    {
        return view('reservasi/isidata');
    }
}
