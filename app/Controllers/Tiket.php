<?php

namespace App\Controllers;

class Tiket extends BaseController
{
    public function index()
    {
        $bodyRaw = $this->request->getVar();
        $code = isset($bodyRaw['noboked']) ? $bodyRaw['noboked'] : '';
        if ($code == '') {
            return redirect()->to(base_url('')); 
        }
        if (substr($code, 0, 2) == 'T-') {
            return redirect()->to(base_url('tiket/detail/'.$code)); 
        }

        $reqData['code'] = $code;
        $dataTicket = $this->httpPostXform(getenv('API_ENDPOINT')."ticket/cek",$reqData);

        if (isset($dataTicket['status'])) {
            return redirect()->to(base_url('')); 
        }

        $ldata['book'] = $dataTicket; 
        $ldata['ticket'] = $dataTicket['ticket']; 
        $ldata['footer'] = view('layouts/footer'); 
        return view('tiket/index',$ldata);
    }  
    public function detail($ticketNumber)
    {
        $reqData['code'] = $ticketNumber;
        $dataTicket = $this->httpPostXform(getenv('API_ENDPOINT')."ticket/cek",$reqData);

        if (isset($dataTicket['status'])) {
            return redirect()->to(base_url('')); 
        }
        
        $ldata['ticket'] = $dataTicket; 
        $ldata['footer'] = view('layouts/footer'); 
        return view('tiket/detail',$ldata);
    }  

    function httpPostXform($url, $data) {                                                                 
        $curl = curl_init($url);                                                                            
        curl_setopt($curl, CURLOPT_POST, true);                                                             
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                   
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);     
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($curl);                                                                       
        curl_close($curl);                            ;                                                   
        $result = json_decode($result,TRUE);                                                                       
        return $result;                                                                      
    }                                                                                                       
}
