<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peminjaman;

class Peminjaman_controller extends Controller
{
    //menampilkan data yang ada pada tabel peminjaman
    public function index(){
        $title = 'Halaman Data peminjaman';
        if(\Auth::user()->status ==1){
        $data = Peminjaman::get();   
        }else{
        $data = Peminjaman::where('user',\Auth::user()->id)->get();   
        }

        return view('peminjaman.index',compact('title','data'));
    }
    
    public function store($id){
        $cek = \DB::table('m_produk')->where('id',$id)->where('stock','>',0)->count();

        if($cek > 0){
            \DB::table('peminjaman')->insert([
            'buku'=>$id,
            'user'=>\Auth::user()->id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
            $buku = \DB::table('m_produk')->where('id',$id)->first();
            $qty_now = $buku->stock;
            $qty_new = $qty_now - 1;

            \DB::table('m_produk')->where('id',$id)->update([
                'stock'=>$qty_new
            ]);

            \Session::flash('sukses','buku berhasil dipinjam');
        return redirect('produk');
        }else{
            \Session::flash('gagal','buku sudah habis');
        return redirect('produk');

        }
        
    }
    public function setujui($id){
        Peminjaman::where('id',$id)->update(['status'=>1]);
        return redirect('pinjam-buku');
    }
    public function tolak($id){
        Peminjaman::where('id',$id)->update(['status'=>2]);
        return redirect('pinjam-buku');
    }
}
