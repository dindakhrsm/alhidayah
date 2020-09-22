@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Kategori Transaksi')

@section('content')
    {{--<div class="container">--}}
    <div class="content-wrapper">
        <div class="row  justify-content-center">
            <section class="content">

            <div class="col-md-10">
                <div class="form-group">
                    <div class="card-header">
                        Data Kategori Transaksi &nbsp;
                        <a href="{{ url('/kategoritransaksi/tambah') }}" class="float-right btn btn-sm btn-success">Tambah</a>
                    </div>
                    <br>
                    <div class="box">
                        @if(Session::has('sukses'))
                            <div class="alert alert-success">
                                {{ Session::get('sukses') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama Kategori</th>
                                <th width="25%" class="text-center">OPSI</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach($kategori as $k)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $k->kategori }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/kategoritransaksi/edit/'.$k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ url('/kategoritransaksi/hapus/'.$k->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
@endsection