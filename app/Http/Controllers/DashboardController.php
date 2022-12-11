<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PenjualModel;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'users' => DB::table('users')->count(),
            'penjual' => DB::table('penjual')
                            ->join('kecamatan', 'kecamatan.id_kecamatan', '=', 'penjual.id_kecamatan')
                            ->join('users', 'users.id', '=', 'penjual.user_id')
                            ->where('user_id', auth()->user()->id)->get(),
        ];

        return view('dashboard.index', $data);
    }
}
