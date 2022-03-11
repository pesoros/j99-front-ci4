<?php

namespace App\Controllers;

class Reservasi extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('reservasi/index',$ldata);
    }
    public function pulang()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('reservasi/index2',$ldata);
    }

    public function isidata()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('reservasi/isidata',$ldata);
    }

    public function getFilterData()
    {
        return view('reservasi/listmore');
    }
    public function getmoredata()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if($page != '' && $page > 1) {
            if ($page <= 3) {
                return view('reservasi/listmore');
            }
        } else {
            return '';
        }
    }
    public function getseatreserved()
    {
        $ldata['reserved'] =  Array( "A1", "A4","A5","B1","B4", "B5","B6", "C1", "D1");
        
        header('Content-Type: application/json');
        echo json_encode($ldata);
    }
    public function payment()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('reservasi/payment',$ldata);
    }
    public function invoice()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('reservasi/invoice',$ldata);
    }
    public function addbooking()
    {
        return 'success';
    }
    public function addpayment()
    {
        return '079867';
    }
    public function confirmotp()
    {
        return '079867';
    }
    public function sentotp()
    {
        return '079867';
    }
    public function sentotpmail()
    {
        return '079867';
    }
}
