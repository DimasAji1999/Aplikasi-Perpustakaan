<section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        

        <li class="menu-sidebar"><a href="{{ url('/home') }}"><span class="fa fa-calendar-minus-o"></span> Beranda Dashboard</span></a></li>

        <!-- <li class="menu-sidebar"><a href="{{ url('/supplier') }}"><span class="fa fa-calendar-minus-o"></span>Kategori</span></a></li> -->

        <li class="menu-sidebar"><a href="{{ url('/produk') }}"><span class="fa fa-calendar-minus-o"></span>List Buku</span></a></li>
        
        @if(\Auth::user()->status ==1)
        <li class="menu-sidebar"><a href="{{ url('/pinjam-buku') }}"><span class="fa fa-calendar-minus-o"></span>Data Peminjam Buku</span></a></li>

        
        <li class="menu-sidebar"><a href="{{ url('/pengembalian-buku') }}"><span class="fa fa-calendar-minus-o"></span>Data Pegembalian Buku</span></a></li>
        @endif

        <!-- @if(\Auth::user()->status ==1)
        <li class="menu-sidebar"><a href="{{ url('/manage-anggota') }}"><span class="fa fa-calendar-minus-o"></span>Manage Anggota</span></a></li>

        <li class="menu-sidebar"><a href="{{ url('/laporan') }}"><span class="fa fa-calendar-minus-o"></span>Laporan</span></a></li>
        @endif -->



        <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


      </ul>
    </section>