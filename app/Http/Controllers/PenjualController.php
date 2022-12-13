<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualModel;
use App\Models\KecamatanModel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PenjualController extends Controller
{
    public function __construct()
    {
        $this->PenjualModel = new PenjualModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->User = new User();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'penjual' => $this->PenjualModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
            'users' => $this->User->AllData(),
        ];

        return view('dashboard.penjual.index', $data);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'nama_penjual' => 'required',
            'id_kecamatan' => 'required',
            'ranting' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|max:1024',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('penjual-image');

             $this->PenjualModel->InsertData($validatedData);
        }

        return redirect('/dashboard/penjual')->with('success', 'Penjual berhasil di tambahkan');
    }

    public function edit($id_penjual)
    {
        $data = [
            'submit' => 'Update',
            'penjual' => $this->PenjualModel->DetailData($id_penjual),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];

        return view('dashboard.penjual.edit', $data);
    }

    public function update(Request $request, $id_penjual)
    {
        $rules = [
            'nama_penjual' => 'required',
            'id_kecamatan' => 'required',
            'ranting' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('foto')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('penjual-image');
        }

        $this->PenjualModel->UpdateData($id_penjual, $validatedData);

        return redirect('/dashboard/penjual')->with('info', 'Penjual berhasil di ubah');
    }

    public function delete(PenjualModel $penjual, $id_penjual) 
    {
        $penjual = $this->PenjualModel->DetailData($id_penjual);

        if ($penjual->foto) {
            Storage::delete($penjual->foto);
        }

        $this->PenjualModel->DeleteData($id_penjual);

        return redirect('/dashboard/penjual')->with('delete', 'Penjual Baru berhasil di hapus');
    }
}
