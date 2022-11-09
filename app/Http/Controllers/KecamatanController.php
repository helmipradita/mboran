<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanModel;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->KecamatanModel = new KecamatanModel();
        $this->middleware('auth');
    }

    public function index() {
        $data = [
            'title' => 'Kecamatan',
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];

        return view('dashboard.kecamatan.index', $data);
    }

    public function store() 
    {
        request()->validate([
            'kecamatan' => 'required',
            'geojson' => 'required',
            'warna' => 'required',
        ]);

        $data = [
            'kecamatan' => request()->kecamatan,
            'geojson' => request()->geojson,
            'warna' => request()->warna,
        ];

        $this->KecamatanModel->InsertData($data);

        return back();
    }

    public function edit($id_kecamatan)
    {
        $data = [
            'submit' => 'Update',
            'kecamatan' => $this->KecamatanModel->DetailData($id_kecamatan),
        ];

        return view('dashboard.kecamatan.edit', $data);
    }

    public function update($id_kecamatan)
    {
        request()->validate([
            'kecamatan' => 'required',
            'geojson' => 'required',
            'warna' => 'required',
        ]);

        $data = [
            'kecamatan' => request()->kecamatan,
            'geojson' => request()->geojson,
            'warna' => request()->warna,
        ];

        $this->KecamatanModel->UpdateData($id_kecamatan, $data);

        return redirect()->route('kecamatan.index');
    }

    public function delete($id_kecamatan)
    {
        $this->KecamatanModel->DeleteData($id_kecamatan);

        return redirect()->route('kecamatan.index');
    }
}
