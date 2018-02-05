<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-file-text-o"></i> Daftar Informasi Publik</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/dip/baru")); ?>" data-rel="reload" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Daftar Informasi Baru</a>
                </div>
            </div>
            <div class="panel-body">
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Lihat Berdasarkan Jenis Informasi</label>
                        <select class="form-control select2" id="filter_jenis">
                            <option value="0">Semua</option>
                            <?php foreach($jenis as $k): ?>
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
                                <th>Nomor</th>
                                <th>Nama Informasi</th>
                                <th>Jenis</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Action</th>
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

         var onDeleteClick = function(){
            $(".btn-del").on("click",function(){
            var post_id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            $("#post_id").val(post_id);

                bootbox.confirm({
                message: "Anda Yakin Ingin Menghapus Dokumen Informasi : <br><strong>" + nama + "</strong>",
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
         }

         var datatabel1 = $('#tabel1').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo e(URL::to('admin/dip/datatable/0')); ?>",
            "aoColumns": [
                        { mData: 'nomor', bSortable:true },
                        { mData: 'nama', bSortable:true },
                        { mData: 'jenis', bSortable:true },
                        { mData: 'kategori', bSortable:true },
                        { mData: 'tanggal', bSortable:true },
                        { mData: 'action' , bSortable:true},
                ],
            "drawCallback": function( settings ) {
                onDeleteClick();
            }
        } );

         $("#filter_jenis").val(0);
         $("#filter_jenis").on("change",function(){
             var jenis = $(this).val();
             datatabel1.ajax.url("<?php echo e(URL::to('admin/dip/datatable/')); ?>"  + '/' + jenis);
             datatabel1.ajax.reload();
         }); 

        
    })
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>