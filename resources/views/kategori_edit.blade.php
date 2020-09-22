@extends('layouts.backend.main')

@section('title', 'Al-Hidayah | Edit Kategori Transaksi')

@section('content')
    {{--<div class="container">--}}
    <div class="content-wrapper">
        <div class="row  justify-content-center">

            <section class="content">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Edit Kategori
                        <a href="{{ url('/kategoritransaksi') }}" class="float-right btn btn-sm btn-primary">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form
                                method="post"
                                action="{{url('/kategoritransaksi/update/'.$kategori->id) }}">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="kategori" class="form-control"
                                       value="{{ $kategori->kategori }}">
                                @if($errors->has('kategori'))
                                    <span class="text-danger">
<strong>{{ $errors->first('kategori') }}</strong>
</span>
                                @endif
                            </div>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
@endsection