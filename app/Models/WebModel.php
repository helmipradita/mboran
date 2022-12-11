<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebModel extends Model
{

    public function DataKecamatan()
    {
        return DB::table('kecamatan')
            ->get();
    }

    public function DataUsers()
    {
        return DB::table('users')
            ->get();
    }

    public function DetailKecamatan($id_kecamatan)
    {
        return DB::table('kecamatan')
            ->where('id_kecamatan', $id_kecamatan)->first();
    }

    public function DataPenjual($id_kecamatan)
    {
        return DB::table('penjual')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'penjual.id_kecamatan')
            ->join('users', 'users.id', '=', 'penjual.user_id')
            ->where('penjual.id_kecamatan', $id_kecamatan)
            ->get();
    }

    public function AllDataPenjual()
    {
        return DB::table('penjual')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'penjual.id_kecamatan')
            ->join('users', 'users.id', '=', 'penjual.user_id')
            ->get();
    }

    public function DetailPenjual($id_penjual)
    {
        return DB::table('penjual')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'penjual.id_kecamatan')
            ->join('users', 'users.id', '=', 'penjual.user_id')
            ->where('penjual.id_penjual', $id_penjual)
            ->first();
    }
}
