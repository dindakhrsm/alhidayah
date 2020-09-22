<table id="section-to-print" class="table table-striped table-hover table-bordered mt-4">
    <thead>
    <tr>
        <th class="text-center" rowspan="2" width="11%">Tanggal</th>
        <th class="text-center" rowspan="2" width="5%">Jenis</th>
        <th class="text-center" rowspan="2">Keterangan</th>
        <th class="text-center" rowspan="2">Kategori</th>
        <th class="text-center" colspan="2">Transaksi</th>
    </tr>
    <tr>
        <th class="text-center">Pemasukan</th>
        <th class="text-center">Pengeluaran</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total_pemasukan = 0;
        $total_pengeluaran = 0;
    @endphp
    @foreach($laporan as $t)
        <tr>
            <td class="text-center">{{ date('d-m-Y',strtotime($t->tanggal)) }}</td>
            <td class="text-center">{{ $t->jenis }}</td>
            <td class="text-center">{{ $t->keterangan }}</td>
            <td class="text-center">{{ $t->Kategoritransaksi->kategori }}</td>
            <td class="text-center">
                @if($t->jenis == "Pemasukan")
                    {{ "Rp.".number_format($t->nominal).",-" }}
                @else
                    -
                @endif
            </td>
            <td class="text-center">
                @if($t->jenis == "Pengeluaran")
                    {{ "Rp.".number_format($t->nominal).",-" }}
                @else
                    -
                @endif
            </td>
        </tr>
        @php
            if($t->jenis == "Pemasukan"){
            $total_pemasukan += $t->nominal;
        }else if($t->jenis == "Pengeluaran"){
        $total_pengeluaran += $t->nominal;
    }
        @endphp
    @endforeach

    </tbody>
    <tfoot>
    <tr>
        <td class="text-right font-weight-bold" colspan="4">TOTAL</td>
        <td class="text-center bg-success text-white font-weight-bold">{{ "Rp. ".number_format($total_pemasukan )." ,-"}}</td>
        <td class="text-center bg-danger text-white font-weight-bold">{{ "Rp. ".number_format($total_pengeluaran )." ,-" }}</td>
    </tr>
    </tfoot>
</table>