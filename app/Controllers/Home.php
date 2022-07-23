<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        $this->httpGetXform(getenv('API_ENDPOINT')."clearticket");
        session()->set('bookData', '');
        session()->set('dataToSave', '');
        session()->set('nowat', '');
        session()->set('roundTrip', '');
        $reqData['keyword'] = '';
        $dataKota = $this->httpGetXform(getenv('API_ENDPOINT'));

        $reqData['keyword'] = '';
        $dataKelas = $this->httpPostXform(getenv('API_ENDPOINT')."datakelas",$reqData);

        echo json_encode($dataKota);
        return;

        $ldata['dataKota'] = $dataKota; 
        $ldata['dataKelas'] = $dataKelas; 
        $ldata['footer'] = view('layouts/footer'); 
        return view('home/index',$ldata);
    }  
    public function searchtiket() {
        $dari = isset($_POST['dari']) ? $_POST['dari'] : 'kosong';
        $penumpang = isset($_POST['penumpang']) ? $_POST['penumpang'] : 'kosong';
        return 'success '.$dari.' '.$penumpang;
    }
    public function requestarmada() {
        $reqData['nama'] = isset($_POST['nama']) ? $_POST['nama'] : 'kosong';
        $reqData['nohp'] = isset($_POST['nohp']) ? $_POST['nohp'] : 'kosong';
        $reqData['email'] = isset($_POST['email']) ? $_POST['email'] : 'kosong';
        $reqData['tipebis'] = isset($_POST['tipebis']) ? $_POST['tipebis'] : 'kosong';
        $reqData['keterangan'] = isset($_POST['keterangan']) ? $_POST['keterangan'] : 'kosong';

        $dataSubmit = $this->httpPostXform(getenv('API_ENDPOINT')."contact/pariwisata",$reqData);
        if ($dataSubmit['status'] == 200) {
            $result = 'succces';
        } else {
            $result = 'failed';
        }
        return $result;
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

    public function httpGetXform($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, FALSE);
        return $result;
    }
}
