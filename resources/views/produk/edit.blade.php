@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                </p>
            </div>
            <div class="box-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
               @endif
               
                <form role="form" accept="{{url('produk/'.$dt->id)}}" method="post">
                    @csrf
                    {{ method_field('PUT')}}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Judul Buku</label>
                      <input type="text" name="judul" class="form-control" id="exampleInputPassword1" placeholder="Judul Buku" value="{{ $dt->judul}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Penulis Buku</label>
                      <input type="text" name="penulis" class="form-control" id="exampleInputPassword1" placeholder="Penulis Buku" value="{{$dt->penulis}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Keterangan Buku</label>
                      <textarea class="form-control " name="keterangan" value="{{$dt->keterangan}}"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Stock Buku</label>
                      <input type="number" name="stock" class="form-control" id="exampleInputPassword1" placeholder="Stock Buku" value="{{ $dt->stock}}">
                    </div>
                    <div class="form-group">
                        <select class="form-control select2" name="kategori">
                            <option selected="" disabled="">Pilih Kategori</option>
                            @foreach($supplier as $e=>$dt)
                            <option value="{{ $dt->id}}">{{ $dt->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>

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