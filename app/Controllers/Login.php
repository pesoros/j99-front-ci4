<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $bodyRaw = $this->request->getVar();
        $reqData['email'] = isset($bodyRaw['lusername']) ? $bodyRaw['lusername'] : '';
        $reqData['password'] = isset($bodyRaw['lpassword']) ? $bodyRaw['lpassword'] : '';

        $submitLogin = $this->httpPostXform(getenv('API_ENDPOINT')."login",$reqData);
        if ($submitLogin['status'] == 400) {
            $result = 400;
        } else {
            $getProfile = $this->httpPostXform(getenv('API_ENDPOINT')."account/profile",$reqData);
            session()->set([
                'uid' => $submitLogin['uid'],
                'token' => $submitLogin['token'],
                'email' => $getProfile['email'],
                'firstName' => $getProfile['first_name'],
                'lastName' => $getProfile['last_name'],
                'address' => $getProfile['address'],
                'phone' => $getProfile['phone'],
                'identity' => $getProfile['identity'],
                'identityNumber' => $getProfile['identity_number'],
                'logged_in' => TRUE
            ]);
            $result = 200;
        }

        echo $result;
        return;
    } 

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
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
