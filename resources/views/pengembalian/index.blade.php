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
              <table class="table table-hover myTable">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>User</th>
                          <th>Buku</th>
                          <th>Penulis</th>
                          <th>Status</th>
                          <th>Created_at</th>
                          @if(\Auth::user()->status ==1)
                          <th>Action</th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($data as $e=>$dt)
                      <tr>
                          <td>{{ $e+1 }}</td>
                          <td>{{ $dt->user_r->name }}</td>
                          <td>{{ $dt->buku_r->judul }}</td>
                          <td>{{ $dt->buku_r->penulis }}</td>
                          @if($dt->status ==1)
                          <td><label class="label label-success">Sedang Dipinjam</label></td>
                          @else
                          <td><label class="label label-warning">Sudah Dikembalikan</label></td>
                          @endif
                          <td>{{ $dt->created_at}}</td>

                          @if($dt->status ==1)
                          <td>
                              <a href="{{url('pengembalian-buku/'.$dt->id)}}" class="btn btn-primary btn-flat">Kembalikan</a>
                          </td>
                          @else
                          <td></td>
                          @endif
                      </tr> 
                      @endforeach
                  </tbody>
              </table> 
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