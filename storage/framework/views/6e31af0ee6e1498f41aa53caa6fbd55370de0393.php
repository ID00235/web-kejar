
<?php $__env->startSection('content'); ?>
	<div class="row">
        <div class="col-md-12">
            <div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-server"></i> Referensi <small>Kategori Informasi</small></div>
					<div class="panel-options">
						<a href="<?php echo e(URL::to("admin/referensi/kategoriinformasi/create")); ?>" data-rel="reload" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Buat Baru</a>
					</div>
				</div>
  				<div class="panel-body">
  					<table id="tabel1" class="table table-striped table-condensed table-hover">
		              <thead>
		                <tr>
		                  <th width="30px">No</th>
		                  <th>Nama Kategori Informasi</th>
		                  <th width="150px" style="text-align: center"  ></th>
		                </tr>
		              </thead>
		              <tbody>
		              	<?php
		                	$no=0;
		                ?>
		                <?php foreach($kategoriinformasi as $jn): ?>
		                <?php
		                	$no++;
		                	$id = $jn->id;
		                	$cid = Crypt::encrypt($id );
		                	$nama = $jn->nama;
		                	//jumlah dokumen
		                	$jdk = DB::table("dokumen")->where("kategori",$id)->count();
		                ?>
		                	<tr>
		                		<td><?php echo e($no); ?></td>
		                		<td><?php echo e($nama); ?></td>
		                		<td align="center">
		                			<a href="<?php echo e(URL::to("admin/referensi/kategoriinformasi/edit/$cid")); ?>" class="btn btn-xs btn-success" title="Edit"><i class="fa fa-pencil"></i></a>
		                			<?php if($jdk>0): ?>
		                			<button class="btn btn-xs btn-disable" disabled><i class="fa fa-trash"></i></button>
		                			<?php else: ?>
		                			<button href="#" data-id="<?php echo e($cid); ?>" data-nama="<?php echo e($nama); ?>" class="btn-del btn btn-xs btn-danger" title="Hapus"><i class="fa fa-trash"></i></button>
		                			<?php endif; ?>
		                		</td>
		                	</tr>
		                <?php endforeach; ?>
		              </tbody>
		            </table>
  				</div>
  			</div>
        </div>
    </div>
    <form action="<?php echo e(URL::to('admin/referensi/kategoriinformasi/delete')); ?>" method="post" id="form-delete">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="_token">
    <input type="hidden" name="post_id"  id="post_id">
    </form>
    <script type="text/javascript">
		$(function(){
				  $('#tabel1').DataTable({
				  	 dom: 'Bfrtip',
				  	"order": [[ 0, "asc" ]],
				  	"lengthMenu": [[15,25, 50, 100],[15,25, 50, 100]],
				  	"buttons": [{extend: 'excel', text: '<i class="fa fa-file-excel-o"></i> Cetak Excel',className:'btn btn-default btn-sm'}]
				   });
			           <?php if(Session::has('notice')): ?>
			    	Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
			     <?php endif; ?>

			     <?php if($errors->has()): ?>
			    	Notify.showAlert('Terjadi Kesalahan Periksa Isian Form');
			     <?php endif; ?>

			     $(".btn-del").on("click",function(){
			     	var post_id = $(this).attr('data-id');
			     	var nama = $(this).attr('data-nama');
			     	$("#post_id").val(post_id);

			     	    bootbox.confirm({
				        message: "Anda Yakin Ingin Menghapus Kategori Informasi Berikut: <br><strong>" + nama + "</strong>",
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