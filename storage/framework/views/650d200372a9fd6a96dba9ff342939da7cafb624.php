<?php $__env->startSection('javascript'); ?> @parent
<script src="<?php echo e(asset('bower_components/magnific-popup/dist/jquery.magnific-popup.min.js')); ?>"></script>
<?php $__env->stopSection(); ?> <?php $__env->startSection("stylesheet"); ?>
<link href="<?php echo e(asset('bower_components/magnific-popup/dist/magnific-popup.css')); ?>" rel="stylesheet"> <?php $__env->stopSection(); ?>  <?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-calendar"></i> Agenda Kegiatan</div>
                <div id="post-loader" class="pull-right" style="display: none;">
                    <div class="spinner">
                        <div class="dot1"></div>
                        <div class="dot2"></div>
                    </div>
                </div>
            </div> 
            <div class="panel-body">
               <span class="btn btn-primary btn-outline btn-sm" id="tambah-agenda"><i class="fa fa-plus-circle"></i> Tambah Agenda Baru</span>
                <hr>
                <div id="list-agenda">

                </div>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo e(URL::to('admin/agenda/delete-agenda')); ?>" method="post" id="form-delete">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="post_id" id="post_id">
</form>

<form action="<?php echo e(URL::to('admin/agenda/delete-video')); ?>" method="post" id="form-delete">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="post_id" id="post_id">
</form>

<script type="text/javascript">
    $(function() {
        var base_gallery = "<?php echo e(URL::to('gallery/agenda')); ?>/";
        <?php if(Session::has('notice')): ?>
        Notify.showNotice('<?php echo e(Session::get('
            notice ')); ?>');
        <?php endif; ?>

        $("#tambah-agenda").on("click", function() {
            $("#md-add-agenda").modal('show');
            $(".input-agenda").val('');
        });

        $("#form-store-agenda").ajaxForm({
            beforeSubmit: function() {
                $("#md-add-agenda").modal("hide"), $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistagenda();
                    Notify.showNotice('agenda Berhasil Ditambahkan!');
                    $(".input-agenda").val('');
                }
            }
        });

        $("#form-update-agenda").ajaxForm({
            beforeSubmit: function() {
                $("#md-edit-agenda").modal("hide"), $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistagenda();
                    Notify.showNotice('Perubahan data gallery agenda Berhasil Disimpan!');
                    $(".input-agenda").val('');
                }
            }
        });

        $("#form-delete-agenda").ajaxForm({
            beforeSubmit: function() {
                $("#post-loader").fadeIn()
            },
            success: function(a) {
                $("#post-loader").fadeOut();
                if (a.status) {
                    getlistagenda();
                    Notify.showNotice(a.message);
                }
            }
        });


        $("#submit-agenda").on("click", function() {
            $("#form-store-agenda").submit();
        });

        $("#submit-update-agenda").on("click", function() {
            $("#form-update-agenda").submit();
        });


        var getlistagenda = function(page = 0) {
            $("#post-loader").fadeIn()
            $("#list-agenda").load("<?php echo e(URL::to('admin/agenda/list-agenda').'?page='); ?>" + page,
                function() {
                    $("#post-loader").fadeOut();
                    callback_agenda();
                });
        }

        getlistagenda();
        //pagination
        $(document).on('click', '.paging-agenda a', function(e) {
            getlistagenda($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });

        var callback_agenda = function() {

            $('.view-agenda').magnificPopup({
                type: 'image',
                image : {titleSrc: 'title'}
            });

            $(".btn-delete-agenda").on("click", function() {
                var id = ($(this).attr('data-id'));
                $.get("<?php echo e(URL::to('admin/agenda/detail/')); ?>" + '/' + id, function(respon) {
                    if (respon.status) {
                        $("#delete-agenda-crypt").val(respon.crypt);
                        bootbox.confirm({
                            message: "Anda Yakin Ingin agenda Ini? <br>" + respon.data.nama,
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
                                $("#form-delete-agenda").submit();
                            }
                        });
                    }
                })

            })
        }

    })

</script>

<!-- Modal -->

<div class="modal fade" id="md-add-agenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambahkan Agenda Kegiatan Baru</h4>
            </div>
            <div class="modal-body" id="body-detail">
                <form action="<?php echo e(URL::to('admin/agenda/store')); ?>" id="form-store-agenda" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Nama Agenda Kegiatan</label>
                            <input required  type="text" name="nama" class="input-agenda form-control" placeholder="Masukan Nama Agenda Kegiatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Lokasi Kegiatan</label>
                            <input  required type="text" name="lokasi" class="input-agenda form-control" placeholder="Diselenggarakan di...">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Tanggal Mulai</label>
                            <input required type="text" placeholder="dd/mm/yyyy" name="tanggal_mulai" class="input-agenda form-control date-input">
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Selesai</label>
                            <input type="text" name="tanggal_selesai" placeholder="dd/mm/yyyy" class="input-agenda form-control date-input">
                            <span class="help-block">Diisi Jika Kegiatan Lebih dari 1 Hari</span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-outline btn-success" id="submit-agenda"><i class="fa fa-paper-plane"></i> Simpan</button>
                <button type="button" class="btn  btn-outline btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="modal fade" id="md-edit-agenda" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Agenda Kegiatan</h4>
            </div>
            <div class="modal-body" id="body-detail">
                <form action="<?php echo e(URL::to('admin/agenda/update')); ?>" id="form-update-agenda" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="col-md-12">
                            <legend>Form Edit Gallery agenda</legend>
                        </div>
                    </div>
                    <input type="hidden" id="edit-agenda-crypt" value="" name="crypt">
                    <div class="form-group">
                        <div class="col-md-12">
                            <p><label>Ganti agenda</label></p>
                            <span class=" btn btn-default"><input id="files" type="file" class="file input-agenda" name="agenda"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea required class="form-control input-agenda" name="deskripsi" id="edit-deskripsi" placeholder="Deskripsi agenda..." accept=".png, .gif, .jpeg, .jpg"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success  btn-outline" id="submit-update-agenda"><i class="fa fa-save"></i> Simpan</button>
                <button type="button" class="btn btn-default  btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div tabindex="-1" class="modal fade" id="md-view-agenda" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
                <h3 class="modal-title">Preview agenda</h3>
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

<form action="<?php echo e(URL::to('admin/agenda/delete')); ?>" id="form-delete-agenda" data-parsley-validate="" enctype="multipart/form-data" method="post" class="form-horizontal" role="form">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="delete-agenda-crypt" value="" name="crypt">
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>