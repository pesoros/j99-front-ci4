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
        $bodyRaw = $this->request->getVar();
        $isian['first_name'] = isset($bodyRaw['firstName']) ? $bodyRaw['firstName'] : '';
        $isian['last_name'] = isset($bodyRaw['lastName']) ? $bodyRaw['lastName'] : '';
        $isian['address'] = isset($bodyRaw['address']) ? $bodyRaw['address'] : '';
        $isian['email'] = isset($bodyRaw['email']) ? $bodyRaw['email'] : '';
        $isian['phone'] = isset($bodyRaw['phone']) ? $bodyRaw['phone'] : '';
        $isian['identity'] = isset($bodyRaw['identity']) ? $bodyRaw['identity'] : '';
        $isian['identity_number'] = isset($bodyRaw['identityNumber']) ? $bodyRaw['identityNumber'] : '';

        $updateProfile = $this->httpPostXform(getenv('API_ENDPOINT')."account/profile/update",$isian);

        $getProfile = $this->httpPostXform(getenv('API_ENDPOINT')."account/profile",$isian);
        if ($getProfile) {
            session()->set([
                'email' => $getProfile['email'],
                'firstName' => $getProfile['first_name'],
                'lastName' => $getProfile['last_name'],
                'address' => $getProfile['address'],
                'phone' => $getProfile['phone'],
                'identity' => $getProfile['identity'],
                'identityNumber' => $getProfile['identity_number']
            ]);
        }
        

        return redirect()->to(base_url('profile'));
    }  
    public function updatephone()
    {
        return 'success';
    }  
    public function updatepass()
    {
        $bodyRaw = $this->request->getVar();
        $isian['email'] = isset($bodyRaw['emailpass']) ? $bodyRaw['emailpass'] : '';
        $isian['newPassword'] = isset($bodyRaw['newPassword']) ? $bodyRaw['newPassword'] : '';
        $isian['confNewPassword'] = isset($bodyRaw['confNewPassword']) ? $bodyRaw['confNewPassword'] : '';

        $updatePass = $this->httpPostXform(getenv('API_ENDPOINT')."account/password/change",$isian);

        return redirect()->to(base_url('profile'));
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
