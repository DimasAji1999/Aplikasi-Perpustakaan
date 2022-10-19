<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_supplier;
use App\Models\M_produk;
use App\Models\Peminjaman;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Beranda Tampilan';
        $tot_supplier = M_supplier::count();
        $tot_produk = M_produk::count();
        $tot_peminjaman = Peminjaman::count();
        $tot_user = User::count();

        return view('home',compact('title','tot_supplier','tot_produk','tot_peminjaman','tot_user'));
    }
}
