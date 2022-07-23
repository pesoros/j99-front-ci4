<?php

namespace App\Controllers;

class Paket extends BaseController
{
    public function index()
    {
        $bodyRaw = $this->request->getVar();
        $code = isset($bodyRaw['noresi']) ? $bodyRaw['noresi'] : '';
        if ($code == '') {
            return redirect()->to(base_url('')); 
        }
        $reqData['code'] = $code;
        $dataPaket = $this->httpPostXform(getenv('API_ENDPOINT')."paket/cek",$reqData);

        if ($dataPaket['status'] == 404) {
            return redirect()->to(base_url('')); 
        }

        $ldata['paket'] = $dataPaket; 
        $ldata['footer'] = view('layouts/footer'); 
        return view('paket/index',$ldata);
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
