<?php

namespace App\Controllers;

class Forgot_Password extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('forgot_password/index',$ldata);
    } 
    public function reset($token)
    {
        $ldata['footer'] = view('layouts/footer'); 
        $reqData['token'] = $token;
        $checkToken = $this->httpPostXform(getenv('API_ENDPOINT')."checkresettoken",$reqData);

        if ($checkToken['status'] == 404) {
            return redirect()->to(base_url());
        }

        $ldata['profile'] = $checkToken;

        return view('forgot_password/reset',$ldata);
    } 
    public function sentpass()
    {
        return 'success';
    } 

    function httpPostXform($url, $data) {                                                                 
        $curl = curl_init($url);                                                                            
        curl_setopt($curl, CURLOPT_POST, true);                                                             
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                   
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);     
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($curl);                                                                       
        curl_close($curl);                            ;                                                   
        $result = json_decode($result,TRUE);                                                                       
        return $result;                                                                      
    }    
}
