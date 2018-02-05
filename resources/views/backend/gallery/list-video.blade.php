<div class="row">
    @foreach($video as $pt)
    <div class="col-md-3 col-xs-6">
        <div class="thumbnail overlay">
            <img src="http://img.youtube.com/vi/{{$pt->embed_id}}/hqdefault.jpg" alt="{{$pt->judul}}" class="image" style="width:100%">
            <div class="middle">
                <center>
                    <a  class="view-video btn btn-sm btn-default" href="https://www.youtube.com/watch?v={{$pt->embed_id}}"><i class="fa fa-play"></i></a>&nbsp;
                    <a  class="btn-edit-video btn btn-sm btn-success" data-id="{{$pt->gethashid()}}"><i class="fa fa-pencil"></i></a>&nbsp;
                    <a  class="btn-delete-video btn btn-sm btn-danger" data-id="{{$pt->gethashid()}}"><i class="fa fa-times"></i></a>
                </center>
            </div>
            <div class="caption">
                {{cuttext30($pt->judul)}}
            </div>
        </div>
    </div>
    @endforeach
</div>
{{$video->cssClass('paging-video')->links()}}

