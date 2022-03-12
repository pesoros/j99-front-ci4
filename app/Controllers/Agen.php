<?php

namespace App\Controllers;

class Agen extends BaseController
{
    public function index()
    {
        $ldata['footer'] = view('layouts/footer'); 
        return view('agen/index',$ldata);
    } 
    public function getData() {
        
        $searchByKota = isset($_POST['searchByKota']) ? $_POST['searchByKota'] : '';
        $searchByPropinsi = isset($_POST['searchByPropinsi']) ? $_POST['searchByPropinsi'] : '';
        $draw = $_POST['draw'];
        $row = $_POST['start'];
        $rowperpage = $_POST['length']; // Rows display per page
        $columnIndex = $_POST['order'][0]['column']; // Column index
        $columnName = $_POST['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
        $searchValue = $_POST['search']['value']; // Search value
        if ($searchByKota != '' || $searchByPropinsi != '' ) {
            
            $ldata['data'] =  Array( 
                0=> Array(
                    "id" => '2',
                    "kota" => 'Jakarta',
                    "namaAgen" => 'Agen Surabaya Oy',
                    "alamat" => 'Jl. Jalan Men No. 01, 60181',
                    "telepon" => '081234567890'
                )
            );
        } else {
            $ldata['data'] =  Array( 
                0 => Array(
                    "id" => '1',
                    "kota" => 'Surabaya',
                    "namaAgen" => 'Agen Surabaya Oy',
                    "alamat" => 'Jl. Jalan Men No. 01, 60181',
                    "telepon" => '081234567890'
                ),
                1=> Array(
                    "id" => '2',
                    "kota" => 'Jakarta',
                    "namaAgen" => 'Agen Surabaya Oy',
                    "alamat" => 'Jl. Jalan Men No. 01, 60181',
                    "telepon" => '081234567890'
                ),
                2=> Array(
                    "id" => '3',
                    "kota" => 'Bandung',
                    "namaAgen" => 'Agen Surabaya Oy',
                    "alamat" => 'Jl. Jalan Men No. 01, 60181',
                    "telepon" => '081234567890'
                )
            );
        }
        $ldata["draw"]= $draw;
        $ldata["recordsTotal"]= 3;
        $ldata["recordsFiltered"]= 3;
        $ldata["searchdata"]= $searchByKota;
        $ldata["searchByPropinsi"]= $searchByPropinsi;
        header('Content-Type: application/json');
        echo json_encode($ldata);
    }
}
