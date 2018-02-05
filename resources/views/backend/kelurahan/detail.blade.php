@extends('backend.layout')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Detail Profil Kelurahan/Desa</div>
                <div class="panel-options">
                  <a href="{{URL::to("admin/kelurahan")}}" data-rel="reload" class="btn btn-default btn-sm btn-outline"><i class="fa fa-angle-left"></i> Ke Index Kelurahan/Desa</a>
                  <a href="{{URL::to("admin/kelurahan/edit/".$kelurahan->gethashid())}}" data-rel="reload" class="btn btn-success btn-sm  btn-outline"><i class="fa fa-pencil"></i> Edit</a>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="">
                            <center>
                                <h4>{{$kelurahan->nama}}</h4>
                                <p><?=$kelurahan->alamat_kantor;?></p>
                                <hr>
                            </center>   
                            <div class="thumbnail">
                                <img  width="100%"  src="{{asset($kelurahan->photo_lurah)}}">
                                <div class="caption">
                                    <center><b><?=$kelurahan->nama_lurah;?></b></center>
                                    <center>
                                        @if($kelurahan->tipe=='kelurahan')
                                        (Kepala Kelurahan)
                                        @else
                                        (Kepala Desa)
                                        @endif
                                    </center>
                                </div>
                            </div>                         
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h5>
                            @if($kelurahan->tipe=='kelurahan')
                            Pejabat Kelurahan
                            @else
                            Pejabat Desa
                            @endif
                        </h5>
                        {!! $kelurahan->pejabat_kelurahan !!}
                        <hr>
                        <div class="thumbnail">
                            <img  width="100%"  src="{{asset($kelurahan->photo_kantor)}}">
                            <div class="caption">
                                <center><b>Kantor {{$kelurahan->nama}}</b></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
