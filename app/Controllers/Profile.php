<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {
        $email = session('email');
        $reqData['email'] = $email;
        if (!isset($email)) {
            return redirect()->to(base_url('')); 
        }
        $dataTicket = $this->httpPostXform(getenv('API_ENDPOINT')."account/profile/historyticket",$reqData);
        if ($dataTicket['status'] == 200) {
            $book = $dataTicket['data'];
        } else {
            $book = [];
        }
        $ldata['book'] = $book; 
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

    function httpPostXform($url, $data) {                                                                 
        $curl = curl_init($url);                                                                            
        curl_setopt($curl, CURLOPT_POST, true);                                                             
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));                                    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);                                                   
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));   
        $result = curl_exec($curl);                                                                       
        curl_close($curl);                            ;                                                   
        $result = json_decode($result,TRUE);                                                                       
        return $result;                                                                      
    }                                                                                                       
}
