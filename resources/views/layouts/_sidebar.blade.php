    <aside class="right-sidebar">
        <div class="search-widget widget-shadow">
            <form action="{{route('blog')}}">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" value="{{request('term')}}" name="term" placeholder="Masukkan kata kunci pencarian...">
                    <span class="input-group-btn">
                                <button class="btn btn-lg btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div><!-- /input-group -->
            </form>
        </div>

        <div class="widget widget-shadow">
            <div class="widget-heading widget-custom">
                <h4 style="color:#000000">Kategori</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{route('category', $category->id)}}"><i class="fa fa-angle-right"></i> {{$category->title}} </a>
                        <span class="badge pull-right">{{$category->posts->count()}}</span>
                    </li>
                        @endforeach
                </ul>
            </div>
        </div>

        {{--<div class="widget">
            <div class="widget-heading">
                <h4>Postingan Populer</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($posts as $post)
                    <li>
                        <div class="post-image">
                            <a href="{{route('blog.show', $post->slug)}}">
                                <img src={{$post->image_url}} />
                            </a>
                        </div>
                        <div class="post-body">
                            <h6><a href="{{route('blog.show', $post->slug)}}">{{$post->title}}</a></h6>
                            <div class="post-meta">
                                <span>{{$post->date}}</span>
                            </div>
                        </div>
                    </li>
                        @endforeach
                </ul>
            </div>
        </div>--}}

      {{--  <div class="widget widget-shadow">
            <div class="widget-heading widget-custom">
                <h4 style="color:#000000">Infaq/Sedekah Lebih Mudah dengan scan QR Code berikut ini</h4>
            </div>
            <div class="widget-body">
                <br>
                <center>
              --}}{{-- <img src={{ asset('img/frame.png') }} class="img-responsive" width="220" height="220"> --}}{{--
                <div id="qr-ovo"></div>
                </center>
                <br>
            </div>
        </div>
--}}
      {{--  <div class="widget widget-shadow">
            <div class="widget-heading widget-custom">
                <h4 style="color:#000000">Arsip</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    <li><a href="#"> > March 2020</a></li>
                    <li><a href="#"> > February 2020</a></li>
                    <li><a href="#"> > January 2020</a></li>
                </ul>
            </div>

           --}}{{-- <div class="widget-body">
                <ul class="categories">
                    @foreach($archives as $archive)
                        <li>
                            <a href="{{ route('blog', ['month' => $archive->month, 'year' => $archive->year]) }}">{{ month_name($archive->month) . " " . $archive>year }}</a>
                           <span class="badge pull-right">{{ $archive->post_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>--}}{{--

        </div>--}}

     {{--   <div class="widget widget-shadow">
            <div class="widget-heading widget-custom">
                <h4 style="color:#000000">Tags</h4>
            </div>
            <div class="widget-body">
                <ul class="tags">
                    @foreach($tags as $tag)
                        <li><a href="{{route('tag', $tag->slug)}}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>--}}

        <div class="widget widget-shadow">
            <div class="widget-heading widget-custom">
                <h4 style = "color: #000000">Jadwal Sholat</h4>
            </div>
            <div class="widget-body">
                <br>
                <p style="text-align: center;">
                    <iframe src="https://jam.jadwalsholat.org/digitalclock/" frameborder="0" width="175" height="60"></iframe>
                    <br>
                    <iframe src="https://www.jadwalsholat.org/adzan/ajax.row.php?id=308" frameborder="0" width="220" height="220"></iframe>
                </p>

            </div>
        </div>

        <div class="widget widget-shadow">
            <div class="widget-heading widget-custom">
                <h4 style="color: #000000">Kalender Masehi-Hijriyah</h4>
            </div>
            <div class="widget-body">
                <br>
                <p style="text-align: center;">
                  {{--  <iframe id="iframe2" title="dateconvertor-widget" style="width: 330px; height: 144px; border: 1px solid #ddd;" scrolling="no" src="https://www.islamicfinder.org/dateconvertor-widget"> </iframe>--}}
                     <iframe src="https://www.jadwalsholat.org/hijri/hijri.php" frameborder="0" width="280" height="263"></iframe>
                     <br>
                     <br>
                     <span style="color: #ff0000;">Perhitungan pada sistem konversi Masehi – Hijriah ini memungkinkan terjadi selisih H-1 atau H+1 dari tanggal seharusnya untuk tanggal Hijriyah</span>
                </p>
            </div>
        </div>

        <div class="widget widget-shadow">
            <div class="widget-heading widget-custom">
                <h4 style="color:#000000">Badan Pengawas Tenaga Nuklir</h4>
            </div>
            <div class="widget-body">
                <br>
                <p style="text-align: center;">
                   {{-- <iframe src="#" width="280" height="263" frameborder="0"></iframe>--}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.7524507888647!2d106.81758331476881!3d-6.163897895537371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5e00174ab93%3A0x1c9b2be62e672e0d!2sBadan%20Pengawas%20Tenaga%20Nuklir!5e0!3m2!1sid!2sid!4v1583480337983!5m2!1sid!2sid" width="280" height="300" frameborder="0"></iframe>

                    <br>
                </p>
            </div>
        </div>

    </aside>

{{-- @section('script')
    <script src="{{ asset('js/easy.qrcode.js') }}"></script>
    <script>
        //https://www.cssscript.com/qr-code-generator-logo-title/
        var qrcode = new QRCode("qr-ovo", {
            text: "085772906772#KAREN%20DHRAMAKUSUMA%20",
            logo: "{{asset('img/ovo.png')}}",
            width: 220,
            height: 220,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });
    </script>
@endsection --}}
