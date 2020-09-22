@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Rangkuman Transaksi')

@section('content')
    {{--<div class="container">--}}
    <div class="content-wrapper">
        <div class="row  justify-content-center">

            <section class="content">
<br>
                <br>
                <br>
                <br>
           {{-- <div class="col-md-3 my-3">

                <div class="card py-2 alert-success">
                    <div class="panel-body">
                        --}}{{--<h4>{{ "Rp " . number_format($pemasukan_hari_ini) . " ,-" }}</h4>--}}{{--
                        <h4>Rp 0,- </h4>
                        <b>Pemasukan Hari Ini</b>
                    </div>
                </div>

            </div>


            <div class="col-md-3 my-3">

                <div class="card py-2 alert-success">
                    <div class="panel-body">
                       --}}{{-- <h4>{{ "Rp " . number_format($pemasukan_bulan_ini) . " ,-" }}</h4>--}}{{--
                        <h4>Rp 0,-</h4>
                        <b>Pemasukan Bulan Ini</b>
                    </div>
                </div>

            </div>


            <div class="col-md-3 my-3">

                <div class="card py-2 alert-success">
                    <div class="panel-body">
                 --}}{{--       <h4>{{ "Rp " . number_format($pemasukan_tahun_ini) . " ,-" }}</h4>--}}{{--
                        <h4>Rp 1.550.000,00</h4>
                        <b>Pemasukan Tahun Ini</b>
                    </div>
                </div>

            </div>


            <div class="col-md-3 my-3">

                <div class="card bg-success alert-info">
                    <div class="panel-body">
                       --}}{{-- <h4>{{ "Rp " . number_format($seluruh_pemasukan) . " ,-" }}</h4>--}}{{--
                        <h4>Rp 1.550.000,00</h4>
                        <b>Seluruh Pemasukan</b>
                    </div>
                </div>

            </div>



            <div class="col-md-3 my-3">

                <div class="card alert-danger py-2">
                    <div class="panel-body">
                --}}{{--        <h4>{{ "Rp " . number_format($pengeluaran_hari_ini) . " ,-" }}</h4>--}}{{--
                        <h4>-</h4>
                        <b>Pengeluaran Hari Ini</b>
                    </div>
                </div>

            </div>



            <div class="col-md-3 my-3">

                <div class="card alert-danger py-2">
                    <div class="panel-body">
                   --}}{{--     <h4>{{ "Rp " . number_format($pengeluaran_bulan_ini) . " ,-" }}</h4>--}}{{--
                        <h4>-</h4>
                        <b>Pengeluaran Bulan Ini</b>
                    </div>
                </div>

            </div>



            <div class="col-md-3 my-3">

                <div class="card alert-danger py-2">
                    <div class="panel-body">
                       --}}{{-- <h4>{{ "Rp " . number_format($pengeluaran_tahun_ini) . " ,-" }}</h4>--}}{{--
                        <h4>Rp 1.400.000,00</h4>
                        <b>Pengeluaran Tahun Ini</b>
                    </div>
                </div>

            </div>



            <div class="col-md-3 my-3">

                <div class="card bg-danger alert-warning" style="background:green;">
                    <div class="panel-body">
                        --}}{{--<h4>{{ "Rp " . number_format($seluruh_pengeluaran) . " ,-" }}</h4>--}}{{--
                        <h4>Rp 1.400.000,00</h4>
                        <b>Seluruh Pengeluaran</b>
                    </div>
                </div>

            </div>--}}

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info" style="background:green;">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success" style="background:green;"  >
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning" style="background:green;">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger" style="background:dodgerblue;">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>


                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info" style="background:orangered;">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success" style="background:orangered;"  >
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning" style="background:orangered;">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger" style="background:lightcoral;">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

            </section>

        </div>



    </div>

@endsection
