<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_produk;
use App\Models\m_supplier;

class Produk_controller extends Controller
{
    //untuk melihat data yang ada pada table produk
    public function index(){
        $title = 'List Buku';
        $data = \DB::table('m_produk as b')->join('m_supplier as k','b.kategori','=','k.id')->select('b.judul','b.penulis','b.keterangan','b.stock','k.nama','b.created_at','b.id')->get();
        return view('produk.index',compact('title','data'));
    }

    //untuk melihat data buku yang stocknya nol
    public function kosong(){
         $title = 'List Buku Stock Habis';
         $data = \DB::table('m_produk as b')->join('m_supplier as k','b.kategori','=','k.id')->select('b.judul','b.penulis','b.keterangan','b.stock','k.nama','b.created_at','b.id')->where('b.stock','<',1)->get();

        return view('produk.index',compact('title','data'));
    }

    //untuk menambahkan data yang ada pada table produk
    public function add(){
        $title = 'Tambah Buku';
        $supplier = M_supplier::get();

        return view('produk.add',compact('title','supplier'));
    }
    //untuk menambahkan data yang ada pada table produk
    public function store(Request $request){
        $this->validate($request,[
            'judul'=>'required',
            'penulis'=>'required',
            'keterangan'=>'required',
            'stock'=>'required',
            'kategori'=>'required'
     ]);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data = $request->except(['_token']);
        M_produk::insert($data);

        \Session::flash('sukses','Data Berhasil Ditambahkan');
        return redirect('produk/add');
    }
    //untuk mengedit data yang ada pada table produk
    public function edit($id){
        $title = 'Edit Buku';
        $supplier = M_supplier::get();
        $dt = M_produk::find($id);

        return view('produk.edit',compact('title','supplier','dt'));
    }
    //untuk mengupdate data yang ada pada table produk
     public function update(Request $request, $id){
        $this->validate($request,[
            'judul'=>'required',
            'penulis'=>'required',
            'keterangan'=>'required',
            'stock'=>'required',
            'kategori'=>'required'
     ]);
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data = $request->except(['_token','_method']);
        M_produk::where('id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil Diupdate');
        return redirect('produk');
    }
    //untuk menghapus data yang ada pada tabel produk
    public function delete($id){
        try{
            M_produk::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');
        }catch (\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }
}
