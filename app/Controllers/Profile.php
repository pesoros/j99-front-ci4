<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('profile/index',$ldata);
    }  
    public function update()
    {
        return 'succes';
    }  
    public function updatephone()
    {
        return 'success';
    }  
    public function updatepass()
    {
        return 'error-Yah error';
    }  
}
