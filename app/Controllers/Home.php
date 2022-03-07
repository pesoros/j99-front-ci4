<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('home/index',$ldata);
    }  
    public function searchtiket() {
        $dari = isset($_POST['dari']) ? $_POST['dari'] : 'kosong';
        $penumpang = isset($_POST['penumpang']) ? $_POST['penumpang'] : 'kosong';
        return 'success '.$dari.' '.$penumpang;
    }
    public function requestarmada() {
        $nama = isset($_POST['nama']) ? $_POST['nama'] : 'kosong';
        return 'success';
    }
}
