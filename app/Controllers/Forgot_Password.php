<?php

namespace App\Controllers;

class Forgot_Password extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('forgot_password/index',$ldata);
    } 
    public function sentpass()
    {
        return 'success';
    } 
}
