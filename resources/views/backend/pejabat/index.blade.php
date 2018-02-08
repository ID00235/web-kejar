@section('javascript') @parent
<script src="{{asset('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
@endsection @section("stylesheet")
<link href="{{asset('bower_components/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet"> @endsection @extends('backend.layout') @section('content')
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-users"></i> Pejabat</div>
                <div id="post-loader" class="pull-right" style="display: none;">
                    <div class="spinner">
                        <div class="dot1"></div>
                        <div class="dot2"></div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#photo"><i class="fa fa-users"></i> Pejabat</a></li>
                </ul>
                <div class="tab-content">
                    <div id="photo" class="tab-pane fade in active">
                        <br>
                        <span class="btn btn-primary btn-outline btn-sm" id="tambah-photo"><i class="fa fa-plus-circle"></i> Tambah Photo Pejabat</span>
                        <hr>
                        <div id="list-photo">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{URL::to('admin/pejabat-struktural/delete')}}" method="post" id="form-delete">
    {{csrf_field()}}
    <input type="hidden" name="post_id" id="post_id">
</form>

<script type="text/javascript">
    $(function() {
        var base_gallery = "{{URL::to('gallery/pejabat')}}/";
        @if(Session::has('notice'))
        Notify.showNotice('{{Session::get('
            notice ')}}');
        @endif

        $("#tambah-photo").on("click", function() {
            $("#md-add-photo").modal('show');
        });

        $("#form-store-photo").ajaxForm({
            beforeSubmit: function() {
                $("#md-add-photo").modal("hide"), $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistphoto();
                    Notify.showNotice('Photo Pejabat Berhasil Ditambahkan!');
                    $(".input-photo").val('');
                }
            }
        });

        $("#form-update-photo").ajaxForm({
            beforeSubmit: function() {
                $("#md-edit-photo").modal("hide"), $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistphoto();
                    Notify.showNotice('Perubahan data gallery photo pejabat Berhasil Disimpan!');
                    $(".input-photo").val('');
                }
            }
        });

        $("#form-delete-photo").ajaxForm({
            beforeSubmit: function() {
                $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistphoto();
                    Notify.showNotice(a.message);
                }
            }
        });


        $("#submit-photo").on("click", function() {
            $("#form-store-photo").submit();
        });



        var getlistphoto = function(page = 0) {
            $("#post-loader").fadeIn()
            $("#list-photo").load("{{URL::to('admin/pejabat-struktural/list').'?page='}}" + page,
                function() {
                    $("#post-loader").fadeOut();
                    callback_photo();
                });
        }

        getlistphoto();
        //pagination
        $(document).on('click', '.paging-photo a', function(e) {
            getlistphoto($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });

        var callback_photo = function() {

            $(".btn-delete-photo").on("click", function() {
                var id = ($(this).attr('data-id'));
                $.get("{{URL::to('admin/pejabat-struktural/detail/')}}" + '/' + id, function(respon) {
                    if (respon.status) {
                        $("#delete-photo-crypt").val(respon.crypt);
                        bootbox.confirm({
                            message: "Anda Yakin Ingin Photo Ini? <br>" + respon.data.jabatan,
                            buttons: {
                                confirm: {
                                    label: 'Ya, Hapus',
                                    className: '  btn-outline btn-danger'
                                },
                                cancel: {
                                    label: 'Batalkan',
                                    className: ' btn-outline btn-default'
                                }
                            },
                            callback: function(result) {
                                if (!result) return;
                                $("#form-delete-photo").submit();
                            }
                        });
                    }
                })

            })
        }

      


        


       
        




    })

</script>

<!-- Modal -->

<div class="modal fade" id="md-add-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambahkan Pejabat Struktural</h4>
            </div>
            <div class="modal-body" id="body-detail">
                <form action="{{URL::to('admin/pejabat-struktural/store')}}" id="form-store-photo" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="col-md-12">
                            <legend>Form Upload Photo Baru (<small>Ukuran FIle Max 1MB</small>)</legend>
                            <p>Agar tampilan maksimal gunakan resolusi gambar gunakan ukuran 480x480</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <span class=" btn btn-default"><input id="files" required type="file" class="file input-photo" name="photo" required></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" required name="jabatan" placeholder="Masukan Nama Jabatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Nama Pejabat</label>
                            <input type="text"  class="form-control" required name="nama" placeholder="Masukan Nama Pejabat">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-outline btn-success" id="submit-photo"><i class="fa fa-paper-plane"></i> Simpan</button>
                <button type="button" class="btn  btn-outline btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<form action="{{URL::to('admin/pejabat-struktural/delete')}}" id="form-delete-photo" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
    {{csrf_field()}}
    <input type="hidden" id="delete-photo-crypt" value="" name="crypt">
</form>

@endsection
