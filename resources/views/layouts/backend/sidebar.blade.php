<aside class="main-sidebar" >
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src={{asset("backend/img/muslim-man-160x160.png")}} class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="{{request()->segment(1)=='home'?'active':''}}">
                <a href="{{url('/home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

           {{-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil"></i>
                    <span>Postingan</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.blog.index')}}"><i class="fa fa-circle-o"></i> Semua Postingan </a></li>
                    <li><a href="{{route('backend.blog.create')}}"><i class="fa fa-circle-o"></i> Tambah Baru </a></li>
                </ul>
            </li>--}}

            @hasanyrole('superadmin|admin|pelak1')
                <li class="{{request()->routeIs('backend.blog*')?'active':''}}">
                    <a href="{{route('backend.blog.index')}}">
                        <i class="fa fa-pencil"></i> <span>Artikel</span>
                    </a>
                </li>
            @else
            @endhasanyrole


            @hasanyrole('superadmin|admin|pelak2')
            <li class="treeview {{(
                request()->segment(1)=='rangkumantransaksi'
                // ||request()->segment(1)=='kategoritransaksi'
                ||request()->segment(1)=='transaksi'
                ||request()->routeIs('backend.laporan*')
                )?'active menu-open':'ss'}}">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>Laporan Keuangan</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{request()->segment(1)=='rangkumantransaksi'?'active':''}}"><a href="{{ url('rangkumantransaksi') }}"><i class="fa fa-circle-o"></i> Rangkuman Transaksi </a></li>
                        {{-- <li><a href="{{route('backend.categories.index')}}"><i class="fa fa-circle-o"></i> Kategori Transaksi </a></li> --}}
                        <li class="{{request()->segment(1)=='transaksi'?'active':''}}"><a href="{{ url('transaksi') }}"><i class="fa fa-circle-o"></i> Input Transaksi </a></li>
                        {{-- <li><a href="{{route('backend.transaksi.index')}}"><i class="fa fa-circle-o"></i> Input Transaksi </a></li> --}}
                        {{-- <li><a href="{{ route('backend') }}"><i class="fa fa-circle-o"></i> Cetak Laporan </a></li> --}}
                        <li class="{{request()->routeIs('backend.laporan*')?'active':''}}"><a href="{{route('backend.laporan.index')}}"><i class="fa fa-circle-o"></i> Cetak Laporan </a></li>
                    </ul>
                </li>
            @else
            @endhasanyrole
            @hasanyrole('superadmin|admin|pelak1|pelak2')
                <li class="treeview {{(
                    request()->routeIs('backend.users*')
                    ||request()->routeIs('backend.categories*'))
                    ||request()->segment(1)=='kategoritransaksi'
                    ?'active menu-open':'ss'}}">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>Pengaturan</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        @hasanyrole('superadmin|admin')
                            <li class="{{request()->routeIs('backend.users*')?'active':''}}"><a href="{{route('backend.users.index')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
                        @else
                        @endhasanyrole

                            @hasanyrole('superadmin|admin')
                            <li class="{{request()->routeIs('backend.profil*')?'active':''}}"><a href="{{route('backend.profil.index')}}"><i class="fa fa-book"></i> <span>Profil</span></a></li>
                            @else
                                @endhasanyrole

                                @hasanyrole('superadmin|admin')
                                <li class="{{request()->routeIs('backend.jadwaljumatan*')?'active':''}}"><a href="{{route('backend.jadwaljumatan.index')}}"><i class="fa fa-calendar"></i> <span>Jadwal Jumatan</span></a></li>
                                @else
                                    @endhasanyrole

                                    @hasanyrole('superadmin|admin')
                                    <li class="{{request()->routeIs('backend.jadwalkajian*')?'active':''}}"><a href="{{route('backend.jadwalkajian.index')}}"><i class="fa fa-calendar"></i> <span>Jadwal Kajian</span></a></li>
                                    @else
                                        @endhasanyrole

                                @hasanyrole('superadmin')
                                <li class="{{request()->routeIs('backend.kategorigaleri*')?'active':''}}"><a href="{{route('backend.kategorigaleri.index')}}"><i class="fa fa-archive"></i> <span>Kategori Foto</span></a></li>
                                @else
                                    @endhasanyrole

                                @hasanyrole('superadmin')
                                <li class="{{request()->routeIs('backend.galeri*')?'active':''}}"><a href="{{route('backend.galeri.index')}}"><i class="fa fa-photo"></i> <span>Galeri Foto</span></a></li>
                                @else
                                    @endhasanyrole

                                    @hasanyrole('superadmin')
                                    <li class="{{request()->routeIs('backend.video*')?'active':''}}"><a href="{{route('backend.video.index')}}"><i class="fa fa-file-video-o"></i> <span>Video</span></a></li>
                                    @else
                                        @endhasanyrole

                        @hasanyrole('superadmin|admin|pelak1')
                            <li class="{{request()->routeIs('backend.categories*')?'active':''}}"><a href="{{route('backend.categories.index')}}"><i class="fa fa-database"></i> <span>Kategori Artikel</span></a></li>
                        @else
                        @endhasanyrole

                        @hasanyrole('superadmin|admin|pelak2')
                            <li class="{{request()->segment(1)=='kategoritransaksi'?'active':''}}"><a href="{{ url('kategoritransaksi') }}"><i class="fa fa-database"></i> Kategori Transaksi </a></li>
                        @else
                        @endhasanyrole

                        @role('superadmin')
                            {{-- <li><a href="#"><i class="fa fa-users"></i> <span>Role</span></a></li> --}}
                        @else
                        @endrole
                    </ul>
                </li>
            @else
            @endhasanyrole
         {{--   <li class="">
                <a href="{{route('backend.ckeditor')}}">
                    <i class="fa fa-pencil"></i> <span>Ckeditor</span>
                </a>
            </li>--}}
        </ul>

    </section>
    <!-- /.sidebar -->

        <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }
    </script>

</aside>
