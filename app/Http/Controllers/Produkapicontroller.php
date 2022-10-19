<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_produk;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class Produkapicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //menampilkan daftar data buku peminjaman
    public function index()
    {
        // membuat variabel baru untuk mewakili tabel daftar buku peminjaman
        $books = M_produk::get();
        //setelah didapatkan datanya maka akan ditampilkan
        $response = [
            'message' => 'List produk',
            'data'=> $books,

        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //membuat data daftar buku baru
    public function store(Request $request)
    {
        //melakukan pengisian data dari daftar buku yang telah disediakan field fieldnya sebagai berikut
        $validator = Validator::make($request->all(),[
            'kategori' => ['required'],
            'judul' => ['required'],
            'penulis' => ['required'],
            'keterangan' => ['required'],
            'stock' => ['required']
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $books = M_produk::create($request->all());
            $response = [
                'message' => 'transaction created',
                'data' => $books
            ];
            //jika data yang dimasukan benar maka akan menampilkan transaksi berhasil
            return response()->json($response, Response::HTTP_CREATED);
            //jika gagal akan menampilkan pesan error
        }catch(\QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo

            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //untuk menampilkan data daftar buku berdasarkan id buku pencarian
    public function show($id)
    {
        //membuat variabel baru untuk mewakili tabel produk kemudian dicari berdasarkan id buku
        $books = M_produk::findOrFail($id);
        //jika telah ditemukan maka akan menampilkan daftar buku tersebut
        $response = [
                'message' => 'Detail transaction resource',
                'data' => $books
            ];

            return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //update data daftar buku peminjaman
    public function update(Request $request, $id)
    {
        //membuat variabel baru untuk mewakili tabel produk kemudian dicari berdasarkan id buku yang akan di update datanya
        $books = M_produk::findOrFail($id);
        // setelah didapatkan kemudian menampilkan validasi data, yang kemudian untuk melakukan pengupdatean
        $validator = Validator::make($request->all(),[
            'kategori' => ['required'],
            'judul' => ['required'],
            'penulis' => ['required'],
            'keterangan' => ['required'],
            'stock' => ['required']
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try{
            $books->update($request->all());
            $response = [
                'message' => 'transaction updated',
                'data' => $books
            ];
        //jika validasi benar maka akan menampilkan pesan ok
            return response()->json($response, Response::HTTP_OK);
        //jika validasi gagal maka akan menampilkan pesan error
        }catch(\QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $books = M_produk::findOrFail($id);

        try{
            $books->delete();
            $response = [
                'message' => 'transaction delete',
            ];
            return response()->json($response, Response::HTTP_OK);
        }catch(\QueryException $e){
            return response()->json([
                'message' => 'Failed'. $e->errorInfo

            ]);
        }
    }
}
