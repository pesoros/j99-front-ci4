<?php

namespace App\Controllers;

class Reservasi extends BaseController
{
    public function index()
    {
        return view('reservasi/index');
    }

    public function isidata()
    {
        return view('reservasi/isidata');
    }
}
