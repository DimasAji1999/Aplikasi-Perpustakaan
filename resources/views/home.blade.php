@extends('layouts.master')

@section('content')

<div class="row">

        <!-- <div class="col-lg-3 col-xs-6">
             <div class="col">
              <p class="card-text">Selamat Datang di Aplikasi Perustakaan.</p>
              @if(\Auth::user()->status ==null)
              <p class="card-text">Silahkan cari dan pelajari buku yang tersedia.</p>
              @endif
              @if(\Auth::user()->status ==1)
              <p class="card-text">Selamat Silahkan Manage Perpustakaan anda.</p>
              @endif -->
          <!-- small box -->
         <!--  <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $tot_supplier }}</h3>

              <p>Total Kategori Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div> -->
           <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
         <!--  </div>
        </div> -->
        <!-- ./col -->
<!-- 
        <div class="row">
        <div class="col-lg-3 col-xs-6"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $tot_produk }}</h3>

              <p>Total Buku Yang tersedia</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div> -->
           <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          <!-- </div>
        </div> -->
        <!-- ./col -->
        <!-- 
              @if(\Auth::user()->status ==1)
        <div class="row">
        <div class="col-lg-3 col-xs-6"> -->
          <!-- small box -->
         <!--  <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $tot_peminjaman }}</h3>
              <p>Total Peminjam Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div> -->
           <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          <!-- </div>
        </div> -->
        <!-- ./col -->

        <!-- <div class="row">
        <div class="col-lg-3 col-xs-6"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $tot_user }}</h3>
              <p>Total Peminjam Buku</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div> -->
           <!--  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          <!-- </div>
        </div> -->
              <!-- @endif -->
        <!-- ./col -->

</div>



@endsection

