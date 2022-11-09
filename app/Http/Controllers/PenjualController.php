<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualModel;
use App\Models\KecamatanModel;
use Illuminate\Support\Facades\Storage;

class PenjualController extends Controller
{
    public function __construct()
    {
        $this->PenjualModel = new PenjualModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'penjual' => $this->PenjualModel->AllData(),
            'kecamatan' => $this->KecamatanModel->AllData(),
        ];

        return view('dashboard.penjual.index', $data);
    }

    public function store(Request $request) 
    {
        $validatedData = $request->validate([
            'nama_penjual' => 'required',
            'id_kecamatan' => 'required',
            'alamat' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|max:1024',
        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('penjual-image');

            // PenjualModel::InsertData($validatedData);
             $this->PenjualModel->InsertData($validatedData);
        }

        return redirect('/dashboard/penjual')->with('success', 'New product has been added');

        // $validatedData = $request->validate([
        //     'nama_penjual' => 'required',
        //     'id_kecamatan' => 'required',
        //     'alamat' => 'required',
        //     'posisi' => 'required',
        //     'deskripsi' => 'required',
        //     'foto' => 'required|max:1024',
        // ]);

        // $file = Request()->foto;
        // $filename = $file->getClientOriginalName();
        // $file->move(public_path('penjual-image'), $filename);

        // $data = [
        //     'nama_penjual' => request()->nama_penjual,
        //     'id_kecamatan' => request()->id_kecamatan,
        //     'alamat' => request()->alamat,
        //     'posisi' => request()->posisi,
        //     'deskripsi' => request()->deskripsi,
        //     'foto' => request()->foto,
        // ];

        // $this->PenjualModel->InsertData($data);

        // return back();
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

        return redirect('/dashboard/penjual')->with('info', 'Product has been updated!');


        // request()->validate([
        //     'nama_penjual' => 'required',
        //     'id_kecamatan' => 'required',
        //     'alamat' => 'required',
        //     'posisi' => 'required',
        //     'deskripsi' => 'required',
        //     'foto' => 'required|max:1024',
        // ]);

        // if (Request()->foto <> "") {
        //     //hapus foto lama
        //     $penjual = $this->PenjualModel->DetailData($id_penjual);
        //     if ($penjual->foto <> "") {
        //         unlink(public_path('penjual-image'). '/' . $penjual->foto);
        //     }

        //     //jika ingin ganti foto
        //     $file = Request()->foto;
        //     $filename = $file->getClientOriginalName();
        //     $file->move(public_path('penjual-image'), $filename);
            
        //     $data = [
        //         'nama_penjual' => request()->nama_penjual,
        //         'id_kecamatan' => request()->id_kecamatan,
        //         'alamat' => request()->alamat,
        //         'posisi' => request()->posisi,
        //         'deskripsi' => request()->deskripsi,
        //         'foto' => request()->foto,
        //     ];

        //     $this->PenjualModel->UpdataData($id_penjual, $data);
        // }else {
        //     //jika tidak ganti foto
        //     $data = [
        //         'nama_penjual' => request()->nama_penjual,
        //         'id_kecamatan' => request()->id_kecamatan,
        //         'alamat' => request()->alamat,
        //         'posisi' => request()->posisi,
        //         'deskripsi' => request()->deskripsi,
        //         'foto' => request()->foto,
        //     ];

        //     $this->PenjualModel->UpdataData($id_penjual, $data);
        // }

        // return redirect()->route('penjual.index');
    }

    public function delete(PenjualModel $penjual, $id_penjual) 
    {
        $penjual = $this->PenjualModel->DetailData($id_penjual);

        if ($penjual->foto) {
            Storage::delete($penjual->foto);
        }

        $this->PenjualModel->DeleteData($id_penjual);

        return redirect('/dashboard/penjual')->with('delete', 'Product has been deleted!');
    }

    // public function delete($id_kecamatan)
    // {
    //     $this->KecamatanModel->DeleteData($id_kecamatan);

    //     return redirect()->route('kecamatan.index');
    // }
}
