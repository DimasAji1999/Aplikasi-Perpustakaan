<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_supplier;

class Supplier_controller extends Controller
{
    public function index(){
        $title = 'Master Data Kategori';
        $data = M_supplier::orderBy('nama','asc')->get();

        return view('supplier.index',compact('title','data'));
    }
    public function add(){
        $title = 'Tambah Kategori';

        return view('supplier.add',compact('title'));
    }
    public function store(Request $request){
        $this->validate($request,[
        'nama'=>'required'
        ]);

        $a['nama'] = $request->nama;
        $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        M_supplier::insert($a);

        \Session::flash('sukses','Data Berhasil Ditambahkan');

        return redirect('supplier');
    }
    public function edit($id){
        $title = 'Edit Kategori';
        $dt = M_supplier::find($id);

        return view('supplier.edit',compact('title','dt'));
    }
     public function update(Request $request, $id){
        $this->validate($request,[
        'nama'=>'required'
        ]);

        $a['nama'] = $request->nama;
        // $a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        M_supplier::where('id',$id)->update($a);

        \Session::flash('sukses','Data Berhasil Update');

        return redirect('supplier');
    }
    public function delete($id){
       try{
            M_supplier::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');
        } catch (Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect('supplier');
    }
}