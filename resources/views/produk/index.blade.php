@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    @if(\Auth::user()->status ==1)
                    <a href="{{url('/produk/add')}}" class="btn btn-sm  btn-flat btn-success "><i class="fa fa-plus"></i> Tambah Buku</a>
                    @endif

                    <a href="{{url('/produk/add/kosong')}}" class="btn btn-sm btn-flat btn-info "><i class="fa fa-"></i> Stock Buku Habis</a>
                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <tr>
                                @if(\Auth::user()->status ==1)
                                <th>Action</th>
                                @endif
                                <th>Pinjam</th>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                @if(\Auth::user()->status ==1)
                                <td>
                                    <div style="width:60px"><a href="{{url('produk/'.$dt->id)}}" class="btn btn-info btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
                                    <button href="{{url('produk/'.$dt->id)}}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button></div>
                                </td>
                                @endif
                                <td>
                                    <a href="{{url('pinjam-buku/'.$dt->id)}}" class="btn btn-flat btn-sm btn-primary"> Pinjam Buku</a>
                                </td>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->judul }}</td>
                                <td>{{ $dt->penulis}}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->keterangan }}</td>
                                <td>{{ $dt->stock }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection