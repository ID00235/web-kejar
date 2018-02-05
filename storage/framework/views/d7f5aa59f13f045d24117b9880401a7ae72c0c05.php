<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Halaman Data Umum</div>
            </div>
            <div class="panel-body">
            <a href="<?php echo e(URL::to("admin/dataangka/baru")); ?>" data-rel="reload" class="btn btn-primary btn-outline btn-sm"><i class="fa fa-plus"></i> Halaman Baru</a>
                <table id="tabel1" class="table table-striped table-condensed table-hover">
		              <thead>
		                <tr>
		                  <th width="30px">No</th>
		                  <th>Nama Halaman</th>
		                  <th width="120px" style="text-align: center"  ></th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php $no=0;?>
		              		<?php foreach($dataangka as $row): ?>
		              			<?php  $no++;?>
		              			<tr>
		              				<td><?php echo e($no); ?></td>
		              				<td><a href="<?php echo e(URL::to('admin/dataangka/detail/'.$row->gethashid())); ?>" class="big2"><?php echo e($row->nama); ?></a></td>
		              				<td>
		              					<a href="<?php echo e(URL::to("admin/dataangka/edit/".$row->gethashid())); ?>" class="btn btn-sm  btn-outline btn-success" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
		              					<button href="#" data-id="<?php echo e($row->gethashid()); ?>" data-nama="<?php echo e($row->nama); ?>" class="btn-del btn  btn-danger btn-sm  btn-outline" title="Hapus"><i class="fa fa-times"></i> Hapus</button>
		              				</td>
		              			</tr>
		              		<?php endforeach; ?>
		              </tbody>
		            </table>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo e(URL::to('admin/dataangka/delete')); ?>" method="post" id="form-delete">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="post_id"  id="post_id">
</form>
<script type="text/javascript">
	$(function(){
         <?php if(Session::has('notice')): ?>
            Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
         <?php endif; ?>
         $('#tabel1').DataTable({
		  	 dom: 'Bfrtip',
		  	"order": [[ 0, "asc" ]],
		  	"lengthMenu": [[15,25, 50, 100],[15,25, 50, 100]],
		   });
        
		$(".btn-del").on("click",function(){
	     	var post_id = $(this).attr('data-id');
	     	var nama = $(this).attr('data-nama');
	     	$("#post_id").val(post_id);

	     	    bootbox.confirm({
		        message: "Anda Yakin Ingin Menghapus Halaman Data: <br><strong>" + nama + "</strong>",
		        buttons: {
		            confirm: {
		                label: 'Ya, Hapus',
		                className: 'btn-danger btn-outline'
		            },
		            cancel: {
		                label: 'Batalkan',
		                className: 'btn-default btn-outline'
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