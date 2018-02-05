<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-file-text-o"></i> Daftar Permohonan Informasi</div>
                <div class="pull-right">
                <a href="<?php echo e(URL::to("admin/permohonan/baru")); ?>" data-rel="reload" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Registrasi Permohonan Baru (Manual)</a>
                </div>
            </div>
            <div class="panel-body">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Lihat Berdasarkan Status</label>
                        <?php
                            $status = DB::table('status_permohonan')->get();
                        ?>
                        <select class="form-control select2" id="filter_status">
                            <option value="0">Semua</option>
                            <?php foreach($status as $k): ?>
                            <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?></option>
                            <?php endforeach; ?>
                        </select>                        
                    </div>
                </div>

                <div class="col-md-12">
                <hr>
                    <table id="tabel1" class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="width: 5px;">Reg.</th>
                                <th>Pemohon</th>
                                <th>Informasi Yg Diperlukan</th>
                                <th style="width: 5px;">Status</th>
                                <th>Tanggal</th>
                                <th>Ket</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-md-12">
                <small>Keterangan: &nbsp;</small>
                    <?php
                        $status=array(
                        "1"=>"<span class='label label-gray'>Belum diproses</span>",
                        "2"=>"<span class='label label-danger'>Ditolak</span>",
                        "3"=>"<span class='label label-default'>Klarifikasi</span>",
                        "4"=>"<span class='label label-info'>Sedang Diproses</span>",
                        "5"=>"<span class='label label-success'>Proses Selesai</span>",
                        "99"=>"<span class='label label-warning'>Menunggu Konfirmasi</span>",
                        );
                    ?>
                    <?php
                        foreach($status as $s){
                            echo $s." ";
                        }
                    ?>
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
            "ajax": "<?php echo e(URL::to('admin/permohonan/datatable/0')); ?>",
            "aoColumns": [
                        { mData: 'nomor', bSortable:false },
                        { mData: 'nama_pemohon', bSortable:false },
                        { mData: 'informasi_diperlukan', bSortable:false },
                        { mData: 'status', bSortable:false },
                        { mData: 'tanggal', bSortable:false },
                        { mData: 'online', bSortable:false },
                        { mData: 'action' , bSortable:false},
                ],
        });

         $("#filter_status").val(0);
         $("#filter_status").on("change",function(){
             var status = $(this).val();
             datatabel1.ajax.url("<?php echo e(URL::to('admin/permohonan/datatable/')); ?>"  + '/' + status);
             datatabel1.ajax.reload();
         }); 
         

        
    })
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>