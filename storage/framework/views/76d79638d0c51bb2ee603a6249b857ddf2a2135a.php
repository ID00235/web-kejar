
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-newspaper-o"></i> Detail Berita</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/berita")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Ke Index Berita</a>
                  <a href="<?php echo e(URL::to("admin/berita/edit/".$record->gethashid())); ?>" data-rel="reload" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                </div>
            </div>
            <div class="panel-body">
                <small>Di Posting: <i class="fa fa-calendar"></i> <?php echo e(tanggal_singkat_indo($record->tanggal)); ?></small>
                <h4><?php echo e($record->judul); ?></h4><br>
                <div class = "thumbnail">
                     <img width="100%" src = "<?php echo e(asset('berita/'.$record->gambar)); ?>" class="img-responsive">
                     <div class = "caption text-center"><p><?php echo e($record->title_gambar); ?></p></div>
                </div>
                <?=$record->isi;?>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo e(URL::to('admin/dip/fileprofil/delete')); ?>" method="post" id="form-delete">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="_token">
    <input type="hidden" name="id_file"  id="post_id">
<form>
<script type="text/javascript">
    $(function(){
         <?php if(Session::has('notice')): ?>
            Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
         <?php endif; ?>

         <?php if($errors->has()): ?>
            Notify.showAlert('Terjadi Kesalahan Upload Files');
         <?php endif; ?>

         $(".btn-del-file").on("click",function(){
                    var post_id = $(this).attr('data-id');
                    var nama = $(this).attr('data-nama');
                    $("#post_id").val(post_id);

                        bootbox.confirm({
                        message: "Anda Yakin Ingin Menghapus Gambar?",
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
                        callback: function (result) {
                            if(!result) return;
                            $("#form-delete").submit();
                            
                        }
                    });
                 })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>