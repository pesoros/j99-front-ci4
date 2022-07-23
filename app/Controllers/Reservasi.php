<?php

namespace App\Controllers;

class Reservasi extends BaseController
{
    public function reservasired(Type $var = null)
    {
        $bodyRaw = $this->request->getVar();
        $reqData['berangkat'] = isset($bodyRaw['dari']) ? $bodyRaw['dari'] : '';
        $reqData['tujuan'] = isset($bodyRaw['tujuan']) ? $bodyRaw['tujuan'] : '';
        $reqData['tanggal'] = isset($bodyRaw['pergi']) ? $bodyRaw['pergi'] : '';
        $reqData['penumpang'] = isset($bodyRaw['penumpang']) ? $bodyRaw['penumpang'] : '';
        $reqData['kelas'] = isset($bodyRaw['kelas']) ? $bodyRaw['kelas'] : '';
        $reqData['pergi'] = isset($bodyRaw['pergi']) ? $bodyRaw['pergi'] : '';
        $reqData['pulang'] = isset($bodyRaw['pulang']) ? $bodyRaw['pulang'] : '';

        $reqData['kelas'] = $reqData['kelas'] == "-" ? '' : $reqData['kelas'];

        return redirect()->to(base_url()."/reservasi?berangkat=".$reqData['berangkat']
            ."&tujuan=".$reqData['tujuan']
            ."&pergi=".$reqData['pergi']
            ."&pulang=".$reqData['pulang']
            ."&tanggal=".$reqData['tanggal']
            ."&penumpang=".$reqData['penumpang']
            ."&kelas=".$reqData['kelas']
        );
    }

    public function index()
    {
        $this->httpGetXform(getenv('API_ENDPOINT')."clearticket");
        $bodyRaw = $this->request->getVar();
        $reqData['berangkat'] = isset($bodyRaw['berangkat']) ? $bodyRaw['berangkat'] : '';
        $reqData['tujuan'] = isset($bodyRaw['tujuan']) ? $bodyRaw['tujuan'] : '';
        $reqData['tanggal'] = isset($bodyRaw['pergi']) ? $bodyRaw['pergi'] : '';
        $reqData['penumpang'] = isset($bodyRaw['penumpang']) ? $bodyRaw['penumpang'] : '';
        $reqData['kelas'] = isset($bodyRaw['kelas']) ? $bodyRaw['kelas'] : '';
        $reqData['pergi'] = isset($bodyRaw['pergi']) ? $bodyRaw['pergi'] : '';
        $reqData['pulang'] = isset($bodyRaw['pulang']) ? $bodyRaw['pulang'] : '';
        
        // echo json_encode($reqData);
        // return;

        if ($reqData['pulang'] == "") {
            $roundTrip = false;
        } else {
            $roundTrip = true;
        }

        $listbus = $this->httpPostXform(getenv('API_ENDPOINT')."listbus", $reqData);

        if (isset($listbus['status'])) {
            return redirect()->to(base_url());
        }

            // echo json_encode($reqData);
            // return;
        
        session()->set('reqData', $reqData);
        session()->set('nowat', 'pergi');
        session()->set('roundTrip', $roundTrip);
        $reqData['keyword'] = '';
        $dataKelas = $this->httpPostXform(getenv('API_ENDPOINT')."datakelas",$reqData);

        $ldata['dataKelas'] = $dataKelas; 
        $datav['berangkat'] = $reqData['berangkat'];
        $datav['tujuan'] = $reqData['tujuan'];
        $datav['tanggal'] = $reqData['tanggal'];
        $datav['listBus'] = $listbus;
        $ldata['listBus'] = view('reservasi/listmore',$datav);
        $ldata['session'] = session('logged_in');
        $ldata['roundTrip'] = $roundTrip;
        $ldata['footer'] = view('layouts/footer');
        return view('reservasi/index', $ldata);
    }

    public function getFilterData()
    {
        $sessionData = session('reqData');
        $getVar = $this->request->getVar();
        // if (!isset($bodyRaw)) {
            $bodyRaw = $sessionData;
        //     if (!isset($bodyRaw)) {
        //         return redirect()->to(base_url());
        //     }
        // }

        $reqData['berangkat'] = isset($bodyRaw['berangkat']) ? $bodyRaw['berangkat'] : '';
        $reqData['tujuan'] = isset($bodyRaw['tujuan']) ? $bodyRaw['tujuan'] : '';
        $reqData['tanggal'] = isset($bodyRaw['pergi']) ? $bodyRaw['pergi'] : '';
        $reqData['penumpang'] = isset($bodyRaw['penumpang']) ? $bodyRaw['penumpang'] : '';
        $reqData['kelas'] = isset($getVar['kelas']) ? $getVar['kelas'] : '';
        $reqData['pergi'] = isset($sessionData['pergi']) ? $sessionData['pergi'] : '';
        $reqData['pulang'] = isset($sessionData['pulang']) ? $sessionData['pulang'] : '';
        if ($reqData['pulang'] == "") {
            $roundTrip = false;
        } else {
            $roundTrip = true;
        }

        $listbus = $this->httpPostXform(getenv('API_ENDPOINT')."listbus", $reqData);
        if (isset($listbus['status'])) {
            return 'empty';
        }
        
        session()->set('reqData', $reqData);
        $datav['berangkat'] = $reqData['berangkat'];
        $datav['tujuan'] = $reqData['tujuan'];
        $datav['tanggal'] = $reqData['tanggal'];
        $datav['listBus'] = $listbus;
        $ldata['listBus'] = view('reservasi/listmore',$datav);

        return view('reservasi/listmore',$datav);
    }

    public function pulang()
    {
        session()->set('nowat', 'pulang');
        $reqData = session('reqData');
        $reqData['tanggal'] = $reqData['pulang'];
        $reqData['wadah'] = $reqData['berangkat'];
        $reqData['berangkat'] = $reqData['tujuan'];
        $reqData['tujuan'] = $reqData['wadah'];
        $reqData['kelas'] = isset($bodyRaw['kelas']) ? $bodyRaw['kelas'] : '';
        $reqData['pergi'] = isset($reqData['pergi']) ? $reqData['pergi'] : '';
        $reqData['pulang'] = isset($reqData['pulang']) ? $reqData['pulang'] : '';
        if ($reqData['pulang'] == "") {
            $roundTrip = false;
        } else {
            $roundTrip = true;
        }

        $listbus = $this->httpPostXform(getenv('API_ENDPOINT')."listbus", $reqData);

        if (isset($listbus['status'])) {
            return 'empty';
        }

        session()->set('reqData', $reqData);
        $dataKelas = $this->httpPostXform(getenv('API_ENDPOINT')."datakelas",$reqData);

        $ldata['dataKelas'] = $dataKelas; 
        $datav['berangkat'] = $reqData['berangkat'];
        $datav['tujuan'] = $reqData['tujuan'];
        $datav['tanggal'] = $reqData['tanggal'];
        $datav['listBus'] = $listbus;
        $ldata['listBus'] = view('reservasi/listmore',$datav);
        $ldata['footer'] = view('layouts/footer');
        return view('reservasi/index', $ldata);
    }

    public function pick($trip_id_no, $trip_route_id, $pricePerSeat, $fleetTypeId, $restoId, $from, $to)
    {
        if (!session('logged_in')) {
            return redirect()->to(base_url()."/daftar");
        }
        if (!empty(session('dataToSave'))) {
            $dataToSave = session('dataToSave');
        }

        $reqData = session('reqData');
        $varName = session('nowat');

        $dataFood['idResto'] = $restoId;
        $dataFood['class'] = $fleetTypeId;
        $foodMenu = $this->httpPostXform(getenv('API_ENDPOINT')."datarestomenu", $dataFood);

        $dataToSave[$varName]['trip_id_no'] = $trip_id_no;
        $dataToSave[$varName]['trip_route_id'] = $trip_route_id;
        $dataToSave[$varName]['pickup_location'] = $from;
        $dataToSave[$varName]['drop_location'] = $to;
        $dataToSave[$varName]['pricePerSeat'] = $pricePerSeat;
        if ($varName == 'pergi') {
            $dataToSave[$varName]['booking_date'] = $reqData['pergi'];
        } else {
            $dataToSave[$varName]['booking_date'] = $reqData['pulang'];
        }
        $dataToSave[$varName]['fleet_type_id'] = $fleetTypeId;
        $dataToSave[$varName]['foodMenu'] = $foodMenu;

        session()->set('dataToSave', $dataToSave);

        if (session('roundTrip') == true && $varName == 'pergi') {
            return redirect()->to(base_url('reservasi/pulang')); 
        }
        return redirect()->to(base_url('reservasi/isidata')); 
    }

    public function isidata()
    {
        $saveData = session('dataToSave');

        if (!isset($saveData)) {
            return redirect()->to(base_url());
        }
        $disclaimer = $this->httpGetXform(getenv('API_ENDPOINT')."content/disclaimer");

        $reqData = session('reqData');
        $ldata['data'] = $saveData;
        $ldata['disclaimer'] = $disclaimer;
        $ldata['penumpang'] = intval($reqData['penumpang']);
        $ldata['roundTrip'] = session('roundTrip');
        $ldata['foodMenuGo'] = $saveData['pergi']['foodMenu'];
        if ($ldata['roundTrip'] == true) {
            $ldata['foodMenuBack'] = $saveData['pulang']['foodMenu'];
        }
        $ldata['footer'] = view('layouts/footer');
        return view('reservasi/isidata', $ldata);
    }

    public function submitData()
    {
        helper(['form', 'url']);

        if (! $this->validate([
            'txtnama' => 'required',
            'txtnohp' => 'required',
            'txtemail' => 'required|valid_email',
            'pnama' => 'required',
            'pnohp' => 'required',
            'pmenumakakanango' => 'required',
            'pbagasi' => 'required',
            'seatgo.*' => 'required',
            ])) {
                $saveData = session('dataToSave');

                if (!isset($saveData)) {
                    return redirect()->to(base_url());
                }
                
                $disclaimer = $this->httpGetXform(getenv('API_ENDPOINT')."content/disclaimer");

                $reqData = session('reqData');
                $ldata['data'] = $saveData;
                $ldata['disclaimer'] = $disclaimer;
                $ldata['penumpang'] = intval($reqData['penumpang']);
                $ldata['roundTrip'] = session('roundTrip');
                $ldata['foodMenuGo'] = $saveData['pergi']['foodMenu'];
                $ldata['validation'] = $this->validator;
                if ($ldata['roundTrip'] == true) {
                    $ldata['foodMenuBack'] = $saveData['pulang']['foodMenu'];
                }
                $ldata['footer'] = view('layouts/footer');
                return view('reservasi/isidata', $ldata);
        }

        $bodyRaw = $this->request->getVar();
        $isian['nama_pemesan'] = isset($bodyRaw['txtnama']) ? $bodyRaw['txtnama'] : '';
        $isian['hp_pemesan'] = isset($bodyRaw['txtnohp']) ? $bodyRaw['txtnohp'] : '';
        $isian['email_pemesan'] = isset($bodyRaw['txtemail']) ? $bodyRaw['txtemail'] : '';
        $isian['pnama'] = isset($bodyRaw['pnama']) ? $bodyRaw['pnama'] : '';
        $isian['pnohp'] = isset($bodyRaw['pnohp']) ? $bodyRaw['pnohp'] : '';
        $isian['pmenumakakanango'] = isset($bodyRaw['pmenumakakanango']) ? $bodyRaw['pmenumakakanango'] : '';
        $isian['pmenumakakananback'] = isset($bodyRaw['pmenumakakananback']) ? $bodyRaw['pmenumakakananback'] : '';
        $isian['pbagasi'] = isset($bodyRaw['pbagasi']) ? $bodyRaw['pbagasi'] : '';
        $isian['seatgo'] = isset($bodyRaw['seatgo']) ? $bodyRaw['seatgo'] : '';
        $isian['seatback'] = isset($bodyRaw['seatback']) ? $bodyRaw['seatback'] : '';

        $dataToSave = session('dataToSave');

        $dataToSave['booker_id'] = '-';
        $dataToSave['booker_name'] = $isian['nama_pemesan'];
        $dataToSave['booker_phone'] = $isian['hp_pemesan'];
        $dataToSave['booker_email'] = $isian['email_pemesan'];

        foreach ($isian['pnama'] as $key => $value) {
            $dataToSave['pergi']['seatPicked'][$key]['name'] = $isian['pnama'][$key];
            $dataToSave['pergi']['seatPicked'][$key]['phone'] = $isian['pnohp'][$key];
            $dataToSave['pergi']['seatPicked'][$key]['food'] = $isian['pmenumakakanango'][$key];
            $dataToSave['pergi']['seatPicked'][$key]['seat'] = $isian['seatgo'][$key];
            $dataToSave['pergi']['seatPicked'][$key]['baggage'] = $isian['pbagasi'][$key];
        }
        if ($isian['seatback'] !== '') {
            foreach ($isian['pnama']  as $key => $value) {
                $dataToSave['pulang']['seatPicked'][$key]['name'] = $isian['pnama'][$key];
                $dataToSave['pulang']['seatPicked'][$key]['phone'] = $isian['pnohp'][$key];
                $dataToSave['pulang']['seatPicked'][$key]['food'] = $isian['pmenumakakananback'][$key];
                $dataToSave['pulang']['seatPicked'][$key]['seat'] = $isian['seatback'][$key];
                $dataToSave['pulang']['seatPicked'][$key]['baggage'] = $isian['pbagasi'][$key];
            }
        }

        session()->set('dataToSave', $dataToSave);

        return redirect()->to(base_url('reservasi/payment')); 
    }

    public function payment()
    {
        $dataToSave = session('dataToSave');

        if (!isset($dataToSave)) {
            return redirect()->to(base_url());
        }

        $priceGo = $dataToSave['pergi']['pricePerSeat'] * count($dataToSave['pergi']['seatPicked']) ;
        if (isset($dataToSave['pulang'])) {
            $priceBack = $dataToSave['pulang']['pricePerSeat'] * count($dataToSave['pulang']['seatPicked']) ;
        } else {
            $priceBack = 0;
        }
        $sumPrice = $priceGo + $priceBack;

        $dataPayment = $this->httpGetXform(getenv('API_ENDPOINT')."datapaymentmethod");

        $ldata['data'] = $dataToSave;
        $ldata['priceGo'] = $priceGo;
        $ldata['priceBack'] = $priceBack;
        $ldata['sumPrice'] = $sumPrice;
        $ldata['dataPayment'] = $dataPayment;
        $ldata['roundTrip'] = session('roundTrip');
        $ldata['footer'] = view('layouts/footer');
        return view('reservasi/payment', $ldata);
    }

    public function addpayment()
    {
        $bodyRaw = $this->request->getVar();
        $paymentMethod = isset($bodyRaw['paymentMethod']) ? $bodyRaw['paymentMethod'] : '';
        $phone = isset($bodyRaw['phone']) ? $bodyRaw['phone'] : '';
        $email = isset($bodyRaw['email']) ? $bodyRaw['email'] : '';
        $sendBy = isset($bodyRaw['sendBy']) ? $bodyRaw['sendBy'] : '';
        $pieces = explode("-", $paymentMethod);

        $dataToSave = session('dataToSave');

        $left = '';
        if ($pieces[0] == 'EWALLET') {
            $left = 'ID_';
        }
        $dataToSave['payment_method'] = $pieces[0];
        $dataToSave['payment_channel_code'] = $left.$pieces[1];

        session()->set('dataToSave', $dataToSave);

        $setOtpData = [
            'phone' => $phone,
            'email' => $email,
            'sendBy' => $sendBy,
        ];

        $setOtp = $this->httpPostXform(getenv('API_ENDPOINT')."otp/set", $setOtpData);

        echo json_encode($dataToSave);
        return;
    }

    public function confirmotp()
    {
        $bodyRaw = $this->request->getVar();
        $phone = isset($bodyRaw['phone']) ? $bodyRaw['phone'] : '';
        $email = isset($bodyRaw['email']) ? $bodyRaw['email'] : '';
        $otp = isset($bodyRaw['otpNumber']) ? $bodyRaw['otpNumber'] : '';

        $setOtpData = [
            'phone' => $phone,
            'email' => $email,
            'otp' => $otp,
        ];

        $checkOtp = $this->httpPostXform(getenv('API_ENDPOINT')."otp/check", $setOtpData);

        if ($checkOtp['status'] == 200) {
            session()->set('readyToSave', true);
        }
        echo json_encode($checkOtp);
        return;
    }

    public function invoice()
    {
        $readyToSave = session('readyToSave');
        if ($readyToSave == true) {
            // session()->set('readyToSave', false);
            $setBookingData = session('dataToSave');
            $setBooking = $this->httpPostXform(getenv('API_ENDPOINT')."booking/add", $setBookingData);

            $priceGo = $setBookingData['pergi']['pricePerSeat'] * count($setBookingData['pergi']['seatPicked']) ;
            if (isset($setBookingData['pulang'])) {
                $priceBack = $setBookingData['pulang']['pricePerSeat'] * count($setBookingData['pulang']['seatPicked']) ;
            } else {
                $priceBack = 0;
            }
            $sumPrice = $priceGo + $priceBack;

            $ldata['priceGo'] = $priceGo;
            $ldata['priceBack'] = $priceBack;
            $ldata['sumPrice'] = $sumPrice;
            $ldata['payment'] = $setBooking['payment'];
            $ldata['payment_tutorial'] = $setBooking['payment_tutorial'];
            $ldata['bookingData'] = $setBookingData;
            $ldata['footer'] = view('layouts/footer');

            // echo json_encode($ldata['payment']['account_number']);
            // return;

            // session()->set('dataToSave', '');

            return view('reservasi/invoice', $ldata);
        } else {
            return redirect()->to(base_url('')); 
        }
        
    }

    
    public function getmoredata()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : '';
        if ($page != '' && $page > 1) {
            if ($page <= 3) {
                return view('reservasi/listmore');
            }
        } else {
            return '';
        }
    }
    public function getseatreserved()
    {
        $this->httpGetXform(getenv('API_ENDPOINT')."clearticket");
        $bodyRaw = $this->request->getVar();
        $data= isset($bodyRaw['data']) ? $bodyRaw['data'] : '';
        $data = explode("_",$data);
        $dataSeat['booking_date'] = $data[0];
        $dataSeat['trip_id_no'] = $data[1];
        $dataSeat['trip_route_id'] = $data[2];
        // $dataSeat['fleet_registration_id'] = $data[3];
        $dataSeat['fleet_type_id'] = $data[4];

        $ldata = $this->httpPostXform(getenv('API_ENDPOINT')."seatlist", $dataSeat);

        // $ldata['reserved'] = array("A1", "A4", "A5", "B1", "B4", "B5", "B6", "C1", "D1");

        header('Content-Type: application/json');
        echo json_encode($ldata);
    }

    public function getseatreservedpforpick()
    {
        $this->httpGetXform(getenv('API_ENDPOINT')."clearticket");
        $bodyRaw = $this->request->getVar();
        $data= isset($bodyRaw['data']) ? $bodyRaw['data'] : '';
        $dataToSave = session('dataToSave');
        if ($data == 'pulang') {
            $data = $dataToSave['pulang'];
        } else {
            $data = $dataToSave['pergi'];
        }

        $dataSeat['booking_date'] = $data['booking_date'];
        $dataSeat['trip_id_no'] = $data['trip_id_no'];
        $dataSeat['trip_route_id'] = $data['trip_route_id'];
        // $dataSeat['fleet_registration_id'] = $data['fleet_registration_id'];
        $dataSeat['fleet_type_id'] = $data['fleet_type_id'];

        $ldata = $this->httpPostXform(getenv('API_ENDPOINT')."seatlist", $dataSeat);

        // $ldata['reserved'] = array("A1", "A4", "A5", "B1", "B4", "B5", "B6", "C1", "D1");

        header('Content-Type: application/json');
        echo json_encode($ldata);
    }
    
    public function addbooking()
    {
        return 'success';
    }
    
    public function sentotp()
    {
        return '079867';
    }
    public function sentotpmail()
    {
        return '079867';
    }

    public function tkt()
    {
        $ldata['reserved'] = array("A1", "A4", "A5", "B1", "B4", "B5", "B6", "C1", "D1");

        header('Content-Type: application/json');
        echo json_encode($ldata);
    }

    public function httpPostXform($url, $data)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        return $result;
    }

    public function httpGetXform($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);     
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        return $result;
    }
}
