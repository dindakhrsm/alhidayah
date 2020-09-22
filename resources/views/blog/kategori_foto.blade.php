@extends('layouts.main_full')

@section('content')
    <div class="container">
        <div class="row mtb-60">
            <div class="heading">
                <h1 style="text-align: center"> Kategori Galeri </h1>
            </div>
            <br>
            <br>

            <div class="row">
                <div class="col-md-12">
                <div class="well">
                    <table style="width:100%">


                        <tr>
                            @foreach($kategoris as $kategoris)
                            <td style="padding:20px;"><a class="example-image-link" href="{{ route("galeri.foto",$kategoris->id) }}" data-lightbox="example-set" data-title="Caption Images"> <img class="thumbnail img-responsive" alt="Bootstrap template" src="{{asset('img/folder_imagess.png')}} "/> </a>
                           <a href="{{ route("galeri.foto",$kategoris->id) }}"> {{$kategoris->nama_kategori}} </a>
                            <span class="badge pull-right">{{$kategoris->images->count()}}</span></td>
                            @endforeach

                        </tr>


                    </table>

                    </div>

                </div>


</div>



        </div>
    </div>

@endsection
