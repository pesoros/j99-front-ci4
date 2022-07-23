<?php

namespace App\Controllers;

class Daftar extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('daftar/index',$ldata);
    } 
    public function addmember()
    {
        $bodyRaw = $this->request->getVar();
        $reqData['email'] = isset($bodyRaw['email']) ? $bodyRaw['email'] : '';
        $reqData['password'] = isset($bodyRaw['password']) ? $bodyRaw['password'] : '';
        $reqData['firstName'] = isset($bodyRaw['firstName']) ? $bodyRaw['firstName'] : '';
        $reqData['lastName'] = isset($bodyRaw['lastName']) ? $bodyRaw['lastName'] : '';
        $reqData['phone'] = isset($bodyRaw['nohp']) ? $bodyRaw['nohp'] : '';
        $reqData['identity'] = isset($bodyRaw['identity']) ? $bodyRaw['identity'] : '';
        $reqData['identityNumber'] = isset($bodyRaw['identityNumber']) ? $bodyRaw['identityNumber'] : '';
        $reqData['address'] = isset($bodyRaw['address']) ? $bodyRaw['address'] : '-';

        $submitRegister = $this->httpPostXform(getenv('API_ENDPOINT')."register",$reqData);
        $result = json_encode($submitRegister['messages']);
        
        return $result;
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
