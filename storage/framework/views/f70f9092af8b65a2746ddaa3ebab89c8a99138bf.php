<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-hand-stop-o"></i> Daftar Pengajuan Keberatan</div>
                <a href="<?php echo e(URL::to('admin/keberatan/baru')); ?>" class="btn btn-primary pull-right btn-sm">
                <i class="fa fa-plus"></i> Pengajuan Keberatan (baru)</a>
                <br>
                <hr>
            </div>
            <div class="panel-body">

                <div class="col-md-12">
                <table id="tabel1" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No. Reg.</th>
                                <th>Reg. Permohonan</th>
                                <th>Pemohon/Pengaju</th>
                                <th>Alasan Keberatan</th>
                                <th>Tanggal</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo e(URL::to('admin/dip/delete')); ?>" method="post" id="form-delete">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="_token">
    <input type="hidden" name="post_id"  id="post_id">
</form>

<script type="text/javascript">
    $(function(){
         <?php if(Session::has('notice')): ?>
            Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
         <?php endif; ?>

         
         var datatabel1 = $('#tabel1').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo e(URL::to('admin/keberatan/datatable')); ?>",
            "aoColumns": [
                        { mData: 'nomor', bSortable:false },
                        { mData: 'nomor_permohonan', bSortable:false },
                        { mData: 'nama_pemohon', bSortable:false },
                        { mData: 'alasan_keberatan', bSortable:false },
                        { mData: 'tanggal', bSortable:false },
                        { mData: 'action' , bSortable:false},
                ],
        });

         
        
    })
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>