<div class="row">
    <div class="col-md-12">
        <ul>
    @foreach($agenda as $pt)
        <li style="margin-bottom: 8px;">
            <b>{{$pt->nama}}</b><br>
            {{$pt->lokasi}}, 
            @if($pt->tanggal_selesai!='0000-00-00') 
                {{tanggal_singkat_indo($pt->tanggal_mulai)}} s/d {{tanggal_singkat_indo($pt->tanggal_selesai)}}
            @else 
                {{tanggal_singkat_indo($pt->tanggal_mulai)}}
            @endif
            <div class="pull-right">
                <a class="btn-delete-agenda btn  btn-outline btn-xs btn-danger" data-id="{{$pt->gethashid()}}"><i class="fa fa-times"></i></a>
            </div>
        </li>
    @endforeach
        </ul>
    </div>
</div>
{{$agenda->cssClass('paging-photo')->links()}}
