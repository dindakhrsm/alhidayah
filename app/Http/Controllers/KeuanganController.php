<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Backend\BackendController;
use Illuminate\Http\Request;
use App\Kategoritransaksi;
use App\Transaksi;
use App\Exports\LaporanExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class KeuanganController extends BackendController
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    //

    /*public function index()
    {
        $categories = Category::with('posts')->orderBy('title')->paginate($this->limit);
        $categoriesCount = Category::count();
        return view("backend.categories.index", compact('categories', 'categoriesCount'));
    }*/
    public $carbon;

    public function __construct()
    {
        $this->carbon=new Carbon();
    }

    public function kategori()
    {
        $kategori = Kategoritransaksi::all();
        return view('kategoritransaksi', ['kategori' => $kategori]);
    }




    public function kategori_tambah()
    {
        $kategoritransaksi = new Kategoritransaksi();
        return view('kategori_tambah', compact('kategoritransaksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* public function store(Requests\CategoryStoreRequest $request)
    {
        //
        Category::create($request->all());
        return redirect('/backend/categories')->with('message', 'kategori telah berhasil ditambahkan!');
    }*/

    public function kategori_aksi(Requests\KategoritransStoreRequest $request)
     {
         Kategoritransaksi::create($request->all());
         return redirect('kategoritransaksi')-> with('message', 'kategori transaksi berhasil ditambahkan!');
     }

    /*public function kategori_aksi(Request $data)
    {
        $data->validate([
            'kategori' => 'required'
        ]);
        $kategori = $data->kategori;

        Kategoritransaksi::insert([
            'kategori' => $kategori
        ]);
        return redirect('kategoritransaksi')->with("sukses","Kategori berhasil tersimpan");
    }*/

    public function kategori_edit($id)
    {
        $kategori = Kategoritransaksi::find($id);
        return view('kategori_edit',['kategori' => $kategori]);
    }

    public function kategori_update($id, Request $data)
    {
        // form validasi
        $data->validate([
            'kategori' => 'required'
        ]);

        $nama_kategori = $data->kategori;
        // update kategori
        $kategori = Kategoritransaksi::find($id);
        $kategori->kategori = $nama_kategori;
        $kategori->save();
// alihkan halaman ke halaman kategori
        return redirect('kategoritransaksi')->with("sukses","Kategori berhasil diubah");
    }

    public function kategori_hapus($id)
    {
        $kategori = Kategoritransaksi::find($id);
        $kategori->delete();

        // menghapus transaksi berdasarkan id kategori yang dihapus
        $transaksi = Transaksi::where('kategori_id',$id);
        $transaksi->delete();

        return redirect('kategoritransaksi')->with("sukses","Kategori berhasil dihapus");
    }

    public function transaksi()
    {
        // mengambil data transaksi
        //$transaksi = Transaksi::all();
        $transaksi = Transaksi::orderBy('id','desc')->paginate(5);

        // passing data transaksi ke view transaksi.blade.php
        return view('transaksi',['transaksi' => $transaksi]);
    }

    public function transaksi_tambah()
    { // mengambil data transaksi
        $kategori = Kategoritransaksi::all();

        // passing data kategori ke view transaksi_tambah.blade.php
        return view('transaksi_tambah',['kategori' => $kategori]);
    }

    public function transaksi_aksi(Request $data)
    {// validasi tanggal,jenis,kategori,nominal wajib isi
        $data->validate([
            'tanggal' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'nominal' => 'required'
        ]);

        // insert data ke table transaksi
        Transaksi::insert([
            'tanggal' => $data->tanggal,
            'jenis' => $data->jenis,
            'kategori_id' => $data->kategori,
            'nominal' => $data->nominal,
            'keterangan' => $data->keterangan
        ]);
        // alihkan halaman ke halaman transaksi sambil mengirim session pesan notifikasi
        return redirect('transaksi')->with("sukses","Transaksi berhasil tersimpan");
    }

    public function transaksi_edit($id)
    {
        // mengambil data kategori
        $kategori = Kategoritransaksi::all();
        // mengambil data transaksi berdasarkan id

        $transaksi = Transaksi::find($id);
        // passing data kategori dan transaksi ke view transaksi_edit.blade.php
        return view('transaksi_edit',['kategori' => $kategori, 'transaksi' =>
            $transaksi]);
    }

    public function transaksi_update($id, Request $data)
    {// validasi tanggal,jenis,kategori,nominal wajib isi
        $data->validate(['tanggal' => 'required',
            'jenis' => 'required',
            'kategori' => 'required',
            'nominal' => 'required'
        ]);

        // ambil transaksi berdasarkan id
        $transaksi = Transaksi::find($id);

        // ubah data tanggal, jenis, kategori, nominal, keterangan
        $transaksi->tanggal = $data->tanggal;
        $transaksi->jenis = $data->jenis;
        $transaksi->kategori_id = $data->kategori;
        $transaksi->nominal = $data->nominal;
        $transaksi->keterangan = $data->keterangan;

        // Simpan perubahan
        $transaksi->save();

        // alihkan halaman ke halaman transaksi sambil mengirim session pesan notifikasi
        return redirect('transaksi')->with("sukses","Transaksi berhasil diubah");
    }

    public function transaksi_hapus($id)
    {
        // Ambil data transaksi berdasarkan id, kemudian hapus
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        // Alihkan halaman kembali ke halaman transaksi sambil mengirim pesan notifikasi
        return redirect('transaksi')->with("sukses","Transaksi berhasil dihapus");
    }

    public function transaksi_cari(Request $data)
    {
        // keyword pencarian
        $cari = $data->cari;
        // mengambil data transaksi
        $transaksi = Transaksi::orderBy('id','desc')
            ->where('jenis','like',"%".$cari."%")
            ->orWhere('tanggal','like',"%".$cari."%")
            ->orWhere('keterangan','like',"%".$cari."%")
            ->orWhere('nominal','=',"%".$cari."%")
            ->paginate(6);
        // menambahkan keyword pencarian ke data transaksi
        $transaksi->appends($data->only('cari'));
        // passing data transaksi ke view transaksi.blade.php
        return view('transaksi',['transaksi' => $transaksi]);
    }


    //laporan keuangan
    public function cetaklaporan(Request $request)
    {
        $kategori = Kategoritransaksi::all();

        if(!isset($request)){
            $dari = $request->dari;
            $sampai = $request->sampai;
            $id_kategori = $request->kategori;
        }else{
            $dari = $this->carbon->startOfYear()->format('Y-m-d');
            $sampai = $this->carbon->endOfYear()->format('Y-m-d');
            $id_kategori = 'semua';
        }

        if($id_kategori == "semua"){
            // $laporan = Transaksi::with(['Kategoritransaksi'])
            $laporan = Transaksi::whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                // ->join('kategoritransaksi', 'transaksi.kategori_id', '=', 'kategoritransaksi.kategori')
                ->orderBy('transaksi.id','desc')->get();
        }else{
            // $laporan = Transaksi::with(['Kategoritransaksi'])
            $laporan = Transaksi::where('kategori_id',$id_kategori)
                ->whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }
        // dd($laporan[0]);
        return view('backend.cetaklaporan.index', ['kategori' => $kategori, 'laporan' => $laporan, 'carbon'=>$this->carbon,'dari'=>$dari,'sampai'=>$sampai,'kat'=>$id_kategori]);
    }

    private function laporan(){

    }

    public function cetaklaporan_hasil(Request $request)
    {
        $request->validate([
            'dari' => 'required',
            'sampai' => 'required']);
        
        // dd($request->dari);
        // data kategori
        $kategori = Kategoritransaksi::all();

        // data filter
        $dari = $request->dari;
        $sampai = $request->sampai;
        $id_kategori = $request->kategori;

        // periksa kategori yang dipiliih
        if($id_kategori == "semua"){
            // jika semua, tampilkan semua transaksi
            // $laporan = Transaksi::with(['Kategoritransaksi'])
            $laporan = Transaksi::whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('transaksi.id','desc')->get();
        }else
        {
            // jika yang dipilih bukan "semua",
            ////tampilkan transaksi berdasarkan kategori yang dipilih
            // $laporan = Transaksi::with(['Kategoritransaksi'])
            $laporan = Transaksi::where('kategori_id',$id_kategori)
                ->whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }

        // passing data laporan ke view laporan
        return view('backend.cetaklaporan.index',['laporan' => $laporan, 'kategori' => $kategori]);
    }

    public function cetaklaporan_print(Request $req)
    {
        $req->validate([
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        // data kategori
        $kategori = Kategori::all();

        // data filter
        $dari = $req->dari;
        $sampai = $req->sampai;
        $id_kategori = $req->kategori;

        // periksa kategori yang dipiliih
        if($id_kategori == "semua"){
            // jika semua, tampilkan semua transaksi
            $laporan = Transaksi::whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }else{
            // jika yang dipilih bukan semua, tampilkan transaksi berdasarkan kategori yang dipilih
            $laporan = Transaksi::where('kategori_id',$id_kategori)
                ->whereDate('tanggal','>=',$dari)
                ->whereDate('tanggal','<=',$sampai)
                ->orderBy('id','desc')->get();
        }
        // passing data laporan ke view laporan
        return view('laporan_print',['laporan' => $laporan, 'kategori' => $kategori]);
    }

    public function cetaklaporan_excel()
    {
        $name=Carbon::now().'laporan.xlsx';
        return Excel::download(new LaporanExport, $name);
    }

    public function cetaklaporan_pdf()
    {
        return Excel::download(new LaporanExport, 'laporan.xlsx');
    }

    public function rangkuman_transaksi()
    {
        return view('rangkuman_transaksi');
        /*{
            $tanggal_hari_ini = date('Y-m-d');
            $bulan_ini = date('m');
            $tahun_ini = date('Y');

            $pemasukan_hari_ini = Transaksi::where('jenis','Pemasukan')
                ->whereDate('tanggal',$tanggal_hari_ini)
                ->sum('nominal');

            $pemasukan_bulan_ini = Transaksi::where('jenis','Pemasukan')
                ->whereMonth('tanggal',$bulan_ini)
                ->sum('nominal');

            $pemasukan_tahun_ini = Transaksi::where('jenis','Pemasukan')
                ->whereYear('tanggal',$tahun_ini)
                ->sum('nominal');

            $seluruh_pemasukan = Transaksi::where('jenis','Pemasukan')->sum('nominal');

            $pengeluaran_hari_ini = Transaksi::where('jenis','Pengeluaran')
                ->whereDate('tanggal',$tanggal_hari_ini)
                ->sum('nominal');

            $pengeluaran_bulan_ini = Transaksi::where('jenis','Pengeluaran')
                ->whereMonth('tanggal',$bulan_ini)
                ->sum('nominal');

            $pengeluaran_tahun_ini = Transaksi::where('jenis','Pengeluaran')
                ->whereYear('tanggal',$tahun_ini)
                ->sum('nominal');

            $seluruh_pengeluaran = Transaksi::where('jenis','Pengeluaran')->sum('nominal');

            return view('rangkuman_transaksi',
                [
                    'pemasukan_hari_ini' => $pemasukan_hari_ini,
                    'pemasukan_bulan_ini' => $pemasukan_bulan_ini,
                    'pemasukan_tahun_ini' => $pemasukan_tahun_ini,
                    'seluruh_pemasukan' => $seluruh_pemasukan,
                    'pengeluaran_hari_ini' => $pengeluaran_hari_ini,
                    'pengeluaran_bulan_ini' => $pengeluaran_bulan_ini,
                    'pengeluaran_tahun_ini' => $pengeluaran_tahun_ini,
                    'seluruh_pengeluaran' => $seluruh_pengeluaran
                ]
            );
        }*/
    }

}
