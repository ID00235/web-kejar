<?php $__env->startSection('javascript'); ?> @parent
<script src="<?php echo e(asset('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js')); ?>"></script>
<?php $__env->stopSection(); ?> <?php $__env->startSection("stylesheet"); ?>
<link href="<?php echo e(asset('bower_components/magnific-popup/dist/magnific-popup.css')); ?>" rel="stylesheet"> <?php $__env->stopSection(); ?>  <?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-photo"></i> Gallery</div>
                <div id="post-loader" class="pull-right" style="display: none;">
                    <div class="spinner">
                        <div class="dot1"></div>
                        <div class="dot2"></div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#photo"><i class="fa fa-photo"></i> Gallery Photo</a></li>
                    <li><a data-toggle="tab" href="#youtube"><i class="fa fa-youtube-play"></i> Gallery Youtube</a></li>
                </ul>
                <div class="tab-content">
                    <div id="photo" class="tab-pane fade in active">
                        <br>
                        <span class="btn btn-primary btn-sm" id="tambah-photo"><i class="fa fa-plus-circle"></i> Tambah Photo Baru</span>
                        <hr>
                        <div id="list-photo">

                        </div>
                    </div>
                    <div id="youtube" class="tab-pane">
                        <br>
                        <span class="btn btn-primary btn-sm" id="tambah-youtube"><i class="fa fa-plus-circle"></i> Tambah Video Youtube</span>
                        <hr>
                        <div id="list-video">

                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo e(URL::to('admin/gallery/delete-photo')); ?>" method="post" id="form-delete">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="post_id" id="post_id">
</form>

<form action="<?php echo e(URL::to('admin/gallery/delete-video')); ?>" method="post" id="form-delete">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="post_id" id="post_id">
</form>

<script type="text/javascript">
    $(function() {
        var base_gallery = "<?php echo e(URL::to('gallery/photo')); ?>/";
        <?php if(Session::has('notice')): ?>
        Notify.showNotice('<?php echo e(Session::get('
            notice ')); ?>');
        <?php endif; ?>

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
                    Notify.showNotice('Photo Berhasil Ditambahkan!');
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
                    Notify.showNotice('Perubahan data gallery photo Berhasil Disimpan!');
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

        $("#submit-update-photo").on("click", function() {
            $("#form-update-photo").submit();
        });


        var getlistphoto = function(page = 0) {
            $("#post-loader").fadeIn()
            $("#list-photo").load("<?php echo e(URL::to('admin/gallery/list-photo').'?page='); ?>" + page,
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

            $('.view-photo').magnificPopup({
                type: 'image',
                image : {titleSrc: 'title'}
            });

            $(".btn-edit-photo").on("click", function(e) {
                e.preventDefault();
                var id = ($(this).attr('data-id'));
                $(".input-photo").val('');
                $.get("<?php echo e(URL::to('admin/gallery/detailphoto/')); ?>" + '/' + id, function(respon) {
                    if (respon.status) {
                        $("#edit-deskripsi").val(respon.data.deskripsi);
                        $("#edit-photo-crypt").val(respon.crypt);
                        $("#md-edit-photo").modal('show');
                    }
                })
            })
            $(".btn-delete-photo").on("click", function() {
                var id = ($(this).attr('data-id'));
                $.get("<?php echo e(URL::to('admin/gallery/detailphoto/')); ?>" + '/' + id, function(respon) {
                    if (respon.status) {
                        $("#delete-photo-crypt").val(respon.crypt);
                        bootbox.confirm({
                            message: "Anda Yakin Ingin Photo Ini? <br>" + respon.data.deskripsi,
                            buttons: {
                                confirm: {
                                    label: 'Ya, Hapus',
                                    className: 'btn-danger'
                                },
                                cancel: {
                                    label: 'Batalkan',
                                    className: 'btn-default'
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

        $("#tambah-youtube").on("click", function() {
            $("#md-add-youtube").modal('show');
        });

        $("#submit-video").on("click", function() {
            $("#form-store-video").submit();
        });

        $("#submit-update-video").on("click", function() {
            $("#form-update-video").submit();
        });


        $("#form-store-video").ajaxForm({
            beforeSubmit: function() {
                $("#md-add-youtube").modal("hide"), $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistvideo();
                    Notify.showNotice('Video Berhasil Ditambahkan!');
                    $(".input-video").val('');
                }
            }
        });

        $("#form-update-video").ajaxForm({
            beforeSubmit: function() {
                $("#md-edit-youtube").modal("hide"), $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistvideo();
                    Notify.showNotice('Perubahan data Video Berhasil Disimpan!');
                    $(".input-photo").val('');
                }
            }
        });

        $("#form-delete-video").ajaxForm({
            beforeSubmit: function() {
                $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistvideo();
                    Notify.showNotice(a.message);
                }
            }
        });


        var getlistvideo = function(page = 0) {
            $("#post-loader").fadeIn()
            $("#list-video").load("<?php echo e(URL::to('admin/gallery/list-video').'?page='); ?>" + page,
                function() {
                    $("#post-loader").fadeOut();
                    callback_video();
                });
        }

        getlistvideo();
        //pagination
        $(document).on('click', '.paging-video a', function(e) {
            getlistvideo($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });

        var callback_video = function() {
            $('.view-video').magnificPopup({
                type: 'iframe',
                iframe: {
                    patterns: {
                        youtube: {
                            index: 'youtube.com/',
                            id: 'v=', 
                            src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
                        }
                    }
                }
            });

            $(".btn-edit-video").on("click", function(e) {
                e.preventDefault();
                var id = ($(this).attr('data-id'));
                $(".input-photo").val('');
                $.get("<?php echo e(URL::to('admin/gallery/detailvideo/')); ?>" + '/' + id, function(respon) {
                    if (respon.status) {
                        $("#edit-judul-video").val(respon.data.judul);
                        $("#edit-url-video").val(respon.data.url);
                        $("#edit-video-crypt").val(respon.crypt);
                        $("#md-edit-youtube").modal('show');
                    }
                })
            })

            $(".btn-delete-video").on("click", function() {
                var id = ($(this).attr('data-id'));
                $.get("<?php echo e(URL::to('admin/gallery/detailvideo/')); ?>" + '/' + id, function(respon) {
                    if (respon.status) {
                        $("#delete-video-crypt").val(respon.crypt);
                        bootbox.confirm({
                            message: "Anda Yakin Ingin Video Ini? <br>" + respon.data.judul,
                            buttons: {
                                confirm: {
                                    label: 'Ya, Hapus',
                                    className: 'btn-danger'
                                },
                                cancel: {
                                    label: 'Batalkan',
                                    className: 'btn-default'
                                }
                            },
                            callback: function(result) {
                                if (!result) return;
                                $("#form-delete-video").submit();
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
                <h4 class="modal-title" id="myModalLabel">Tambahkan Photo Baru</h4>
            </div>
            <div class="modal-body" id="body-detail">
                <form action="<?php echo e(URL::to('admin/gallery/storephoto')); ?>" id="form-store-photo" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="col-md-12">
                            <legend>Form Upload Photo Baru (<small>Ukuran FIle Max 1MB</small>)</legend>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <span class=" btn btn-default"><input id="files" type="file" class="file input-photo" name="photo" required></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea required class="form-control input-photo" name="deskripsi" placeholder="Deskripsi Photo..." accept=".png, .gif, .jpeg, .jpg"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="submit-photo"><i class="fa fa-paper-plane"></i> Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade" id="md-edit-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Gallery Photo</h4>
            </div>
            <div class="modal-body" id="body-detail">
                <form action="<?php echo e(URL::to('admin/gallery/updatephoto')); ?>" id="form-update-photo" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="col-md-12">
                            <legend>Form Edit Gallery Photo</legend>
                        </div>
                    </div>
                    <input type="hidden" id="edit-photo-crypt" value="" name="crypt">
                    <div class="form-group">
                        <div class="col-md-12">
                            <p><label>Ganti Photo</label></p>
                            <span class=" btn btn-default"><input id="files" type="file" class="file input-photo" name="photo"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea required class="form-control input-photo" name="deskripsi" id="edit-deskripsi" placeholder="Deskripsi Photo..." accept=".png, .gif, .jpeg, .jpg"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="submit-update-photo"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div tabindex="-1" class="modal fade" id="md-view-photo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
                <h3 class="modal-title">Preview Photo</h3>
            </div>
            <div class="modal-body">
                <div class="thumbnail">
                    <img src="" id="view-images" style="width:100%">
                    <div class="caption">
                        <center id="view-deskripsi">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo e(URL::to('admin/gallery/deletephoto')); ?>" id="form-delete-photo" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="delete-photo-crypt" value="" name="crypt">
</form>

<div class="modal fade" id="md-add-youtube" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambahkan Video Baru</h4>
            </div>
            <div class="modal-body" id="body-detail">
                <form action="<?php echo e(URL::to('admin/gallery/storevideo')); ?>" id="form-store-video" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Judul Video</label><br>
                            <input type="text" class="form-control input-video" name="judul" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Youtube Embed URL</label><br>
                            <input type="text" class="form-control input-video" name="embed_id" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="submit-video"><i class="fa fa-paper-plane"></i> Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="md-edit-youtube" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ubah Data Video</h4>
            </div>
            <div class="modal-body" id="body-detail">
                <form action="<?php echo e(URL::to('admin/gallery/updatevideo')); ?>" id="form-update-video" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" id="edit-video-crypt" value="" name="crypt">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Judul Video</label><br>
                            <input type="text" id="edit-judul-video" class="form-control input-video" name="judul" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Youtube Embed URL</label><br>
                            <input type="text" id="edit-url-video" class="form-control input-video" name="embed_id" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="submit-update-video"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<form action="<?php echo e(URL::to('admin/gallery/deletevideo')); ?>" id="form-delete-video" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="delete-video-crypt" value="" name="crypt">
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>