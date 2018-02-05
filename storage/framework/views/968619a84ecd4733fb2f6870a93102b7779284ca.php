
<?php $__env->startSection('content'); ?>
<?php
$direktori  = $dokumen->nomor;
?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-file-text-o"></i> Detail Dokumen</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/dip")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Ke Daftar Informasi Publik</a>
                  <a href="<?php echo e(URL::to("admin/dip/edit/".$dokumen->gethashid())); ?>" data-rel="reload" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-condensed table-striped " style="border: none;">
                    <tr><td colspan="3"><b>Informasi Dokumen</b></td></tr>
                    <tr>
                        <td width="15%">Nomor</td>
                        <td width="5px">:</td>
                        <td><?php echo e($dokumen->nomor); ?></td>
                    </tr>
                     <tr>
                        <td width="15%">Nama Dokumen</td>
                        <td width="5px">:</td>
                        <td><?php echo e($dokumen->nama); ?></td>
                    </tr>
                     <tr>
                        <td width="15%">Jenis Informasi</td>
                        <td width="5px">:</td>
                        <td><?php echo e($dokumen->getjenis->nama); ?></td>
                    </tr>
                     <tr>
                        <td width="15%">Kategori</td>
                        <td width="5px">:</td>
                        <td><?php echo e($dokumen->getkategori->nama); ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Deskripsi Informasi</td>
                        <td width="5px">:</td>
                        <td><?=$dokumen->kandungan_informasi;?></td>
                    </tr>
                    <tr>
                        <td width="15%">Tanggal</td>
                        <td width="5px">:</td>
                        <td><?php echo e($dokumen->tanggal); ?></td>
                    </tr>
                    <?php
                        $penerbit = $dokumen->penerbit;
                    ?>
                    <tr>
                        <td width="15%">Penerbit</td>
                        <td width="5px">:</td>
                        <td><?php echo e($penerbit); ?></td>
                    </tr>
                </table>
                 <table class="table table-condensed table-striped table-hover " style="border: none;">
                    <tr><td colspan="1"><b>File Dokumen</b></td><td colspan="2"><b>Kode Akses</b></td></tr>
                    <?php if(!count($filedokumen)): ?>
                        <tr><td colspan="3"><br><span class="alert alert-danger">File Dokumen Masih Kosong, Silahkan Upload Files Dokumen!</span></td></tr>
                    <?php endif; ?>
                    <?php foreach($filedokumen as $files): ?>
                    <?php
                        $filename = $files->filename;
                        $hashid = $files->gethashid();
                        $url_download = URL::to("/download/dokumen/$direktori/$filename");
                        $url_lock = URL::to("/download/dokumen/".Crypt::encrypt($files->id));
                        $url_change_akses = URL::to("/admin/dip/change-akses/$hashid/".$dokumen->gethashid());
                        if ($files->kunci){
                            $url_download = $url_lock;
                        }
                    ?>
                    <tr>
                        <td width="60%"><a href="#"><i class="fa fa-file-text-o"></i>&nbsp;<?php echo e($files->filename); ?></a></td>
                        <td><b><?php if($files->kunci): ?><?php echo e($files->kode); ?><?php endif; ?></b></td>
                        <td width="40%" align="right">
                            <?php if($files->kunci): ?>
                            <a href="<?php echo e($url_change_akses); ?>" class="btn btn-xs btn-disable" title="Akses Dokumen"><i class="fa fa-eye-slash"></i> Akses Dikunci</a>
                            <?php else: ?>
                            <a href="<?php echo e($url_change_akses); ?>" class="btn btn-xs btn-default" title="Akses Dokumen"><i class="fa fa-eye"></i> Akses Dibuka</a>
                            <?php endif; ?>
                            <a href="<?php echo e($url_download); ?>" class="btn btn-xs btn-default" title="Download"><i class="fa fa-download"></i> Download</a>
                            <button href="#" data-id="<?php echo e($files->gethashid()); ?>" data-nama="<?php echo e($files->filename); ?>" class="btn-del-file btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i> Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>                    
                </table>
                <form action="<?php echo e(URL::to('admin/dip/upload/'.Crypt::encrypt($dokumen->id))); ?>" method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <hr>
                    <fieldset>
                    <div class="col-md-12">
                        <div class="form-group <?php if($errors->has('file')): ?> has-error <?php endif; ?>">
                            <label>Tambahkan File Dokumen Informasi Publik (<small>Maksimal Ukuran File 5 MB</small>)</label>
                            <?php if($errors->has('filename')): ?> <small class="text-danger"><br><?php echo e($errors->first('upload')); ?></small><?php endif; ?>
                            <input  class="btn btn-default" type="file" name="file" accept=".xls,.xlsx, .jpg, .png, .gif, .ppt, .pptx, .pdf, .doc, .docx, .rar, .zip" />
                        </div>
                    </div>
                    </fieldset>
                    <div class="col-md-12">
                        <button class="btn btn-success btn-sm" type="submit">
                            <i class="fa fa-paper-plane"></i>
                            Kirim File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo e(URL::to('admin/dip/filedokumen/delete')); ?>" method="post" id="form-delete">
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
                        message: "Anda Yakin Ingin Menghapus File Dokomen: <br><strong>" + nama + "</strong>",
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