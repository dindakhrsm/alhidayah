<div class="card">
    Filter Laporan Keuangan
</div>
<div class="card-body">

    <?php
    if(isset($_GET['dari'])){
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];
        $kat = $_GET['kategori'];
    }
    ?>
    @if(Request::segment(2)=='laporan'||Request::segment(1)=='cetaklaporan')
        @include('backend.cetaklaporan._form')
    @else
        @include('backend.cetaklaporan._form_frontend')
    @endif
    <div class="box" style="background-color: white">
        @include('backend.cetaklaporan.laporan_excel')
    </div>
</div>
{{-- <nav>
    <ul class="pager">
        <li id="new" class="previous"><a href="javascript:void(0)"><span aria-hidden="true">&larr;</span> Newer</a></li>
        <li id="old" class="next"><a href="javascript:void(0)">Older <span aria-hidden="true">&rarr;</span></a></li>
    </ul>
</nav> --}}