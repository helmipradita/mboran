<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;

class WebController extends Controller
{
    public function __construct()
    {
        $this->WebModel = new WebModel();
    }

    public function index()
    {
        $data = [
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'penjual' => $this->WebModel->AllDataPenjual(),
        ];

        return view('index', $data);
    }

    public function penjual()
    {
        $data = [
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'penjual' => $this->WebModel->AllDataPenjual(),
        ];

        return view('penjual', $data);
    }

    public function kecamatan($id_kecamatan) 
    {
        $kec = $this->WebModel->DetailKecamatan($id_kecamatan);

        $data = [
            'title' => 'List Kecamatan',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'penjual' => $this->WebModel->DataPenjual($id_kecamatan),
            'kec' => $kec,
        ];

        return view('kecamatan', $data);
    }
}
