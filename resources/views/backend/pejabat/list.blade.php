<div class="row">
    @foreach($pejabat as $pt)
    <div class="col-md-3 col-xs-6">
        <div class="thumbnail overlay">
            <img src="{{asset('gallery/pejabat/'.$pt->filename)}}" alt="{{$pt->jabatan}} ({{$pt->nama}})" class="image" style="width:100%">
            <div class="middle">
                <center>
                    <a class="btn-delete-photo btn  btn-outline btn-xs btn-danger" data-id="{{$pt->gethashid()}}"><i class="fa fa-times"></i> Hapus</a>
                </center>
            </div>
            <center>
                <label>{{$pt->jabatan}}</label><br>
                {{$pt->nama}}
            </center>
        </div>
    </div>
    @endforeach
</div>
{{$pejabat->cssClass('paging-photo')->links()}}
