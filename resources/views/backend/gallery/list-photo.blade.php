<div class="row">
    @foreach($photo as $pt)
    <div class="col-md-3 col-xs-6">
        <div class="thumbnail overlay">
            <img src="{{asset('gallery/photo/thumb-'.$pt->filename)}}" alt="{{$pt->deskripsi}}" class="image" style="width:100%">
            <div class="middle">
                <center>
                    <a class="view-photo btn btn-xs  btn-outline btn-default" title="{{$pt->deskripsi}}" href="{{asset('gallery/photo/'.$pt->filename)}}"><i class="fa fa-search-plus"></i></a>&nbsp;
                    <a class="btn-edit-photo btn  btn-outline btn-xs btn-success" data-id="{{$pt->gethashid()}}"><i class="fa fa-pencil"></i></a>&nbsp;
                    <a class="btn-delete-photo btn  btn-outline btn-xs btn-danger" data-id="{{$pt->gethashid()}}"><i class="fa fa-times"></i></a>
                </center>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{$photo->cssClass('paging-photo')->links()}}
