<?php

namespace App\Controllers;

class Promosi extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('promosi/index',$ldata);
    }  
    public function getmoredata()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if($page != '' && $page > 1) {
            if ($page <= 3) {
                return view('promosi/listmore');
            }
        } else {
            return '';
        }
    }  
}
