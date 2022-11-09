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

    public function listkecamatan() {
        $data = [
            'title' => 'List Kecamatan',
            'kecamatan' => $this->WebModel->DataKecamatan(),
        ];

        return view('listKecamatan', $data);
    }
}
