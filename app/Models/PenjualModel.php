<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenjualModel extends Model
{
    use HasFactory;

    protected $guarded = ['id_penjual'];

    public function AllData()
    {
        return DB::table('penjual')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'penjual.id_kecamatan')->orderBy('id_penjual', 'DESC')
            ->get();
    }

    public function InsertData($data)
    {
        return DB::table('penjual')
            ->insert($data);
    }

    public function DetailData($id_penjual)
    {
        return DB::table('penjual')
            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'penjual.id_kecamatan')
            ->where('id_penjual', $id_penjual)->first();
    }

    public function UpdateData($id_penjual, $data)
    {
        return DB::table('penjual')
            ->where('id_penjual', $id_penjual)
            ->update($data);
    }

    public function DeleteData($id_penjual)
    {
        return DB::table('penjual')
            ->where('id_penjual', $id_penjual)
            ->delete();
    }
}
