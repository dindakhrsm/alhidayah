<header>
    <nav class="navbar navbar-fixed-top" id="header-color">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <table>
                <tr>
                    <th> <img src="{{ asset('img/logo_alhidayah.png') }}" class="img-responsive" width="50"> </th>
                    <th> <a class="navbar-brand" href="{{route('blog')}}" style="color: #0f0f0f;  text-shadow: 3px 2px 1px grey;">Masjid Al-Hidayah</a><br> </th>
                </tr>
                </table>

                {{-- <div class="col-xs-3 col-sm-3">
                    <a class="navbar-static-top" href="{{route('blog')}}">
                        <img src="{{ asset('img/logo_alhidayah.png') }}" class="img-responsive" width="140">
                    </a>
                  </div>

                <div class="col-xs-9 col-sm-9">
                    <a class="navbar-static-top" href="{{route('blog')}}"><b>Masjid Al-Hidayah</b></a><br>
                </div> --}}

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="the-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{request()->routeIs('blog')?'active-hover':''}}"><a href="{{route('blog')}}" style="color: #0f0f0f; ">Beranda</a></li>
                    {{--<li class="{{request()->routeIs('jadwalkajian')?'active-hover':''}}"><a href="{{route('jadwalkajian')}}" style="color: #0f0f0f; ">Jadwal Kajian</a></li>--}}
                    <li class="dropdown {{request()->routeIs('jadwalkajian')||request()->routeIs('jadwalkajian')?'active-hover':''}}">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #0f0f0f; ">Jadwal
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('jadwaljumatan')}}">Jumatan</a></li>
                            <li><a href="{{url('jadwalkajian')}}">Kajian</a></li>
                        </ul>
                    </li>
                <li class="{{request()->routeIs('profil')?'active-hover':''}}"><a href="{{url('profil/1')}}" style="color: #0f0f0f; ">Profil Masjid</a></li>
                    <li class="{{request()->segment(1)=='keuangan'?'active-hover':''}}"><a href="{{url('keuangan')}}" style="color: #0f0f0f; ">Laporan Keuangan</a></li>
                    <li class="dropdown {{request()->routeIs('gallery')||request()->routeIs('video')?'active-hover':''}}">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #0f0f0f; ">Galeri
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('galeri/kategorifoto')}}">Foto Kegiatan</a></li>
                            <li><a href="{{url('video')}}">Video Ceramah</a></li>
                        </ul>
                    </li>
                   {{-- <li><a href="{{url('galeri')}}">Image</a></li>--}}

                   @if (Auth::guest())
                        <li><a class="" href="{{url('login')}}">Login</a></li>
                    @else
                        <li><a class="" href="{{route('home')}}">Dashboard</a></li>
                        <li><a class="" href="{{url('logout')}}">Logout</a></li>
                    @endif
                </ul>
                {{-- <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a class="btn b-login" href="{{url('login')}}">Login</a></li>
                    @else
                        <li><a class="btn b-dashboard" href="{{route('home')}}">Dashboard</a></li>
                        <li><a class="btn b-logout" href="{{url('logout')}}">Logout</a></li>
                    @endif
                </ul> --}}
            </div><!-- /.navbar-collapse -->

        </div><!-- /.container -->
    </nav>
</header>
