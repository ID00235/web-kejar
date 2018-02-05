
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-photo"></i> Header</div>
                <div class="panel-options">
                  <a href="<?php echo e(URL::to("admin/header/baru")); ?>" data-rel="reload" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Upload Baru</a>
                </div>
            </div>
            <div class="panel-body">
                <table id="tabel1" class="table table-striped table-hover">
		              <thead>
		                <tr>
		                  <th >No.</th>
		                  <th width="70%">Header</th>
		                  <th>Status</th>
		                  <th width="25%" align="right">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php $no=0;?>
		              	<?php foreach($record as $row): ?>
		              	<?php $no++;?>
		              		<tr>
		              			<td><?php echo e($no); ?></td>
		              			<td><?php echo e($row->nama); ?></td>
		              			<td>
		              				<?php if($row->aktif): ?>
		                			<a href="#" 
		                			data-id="<?php echo e($row->gethashid()); ?>" 
		                			data-nama = "<?php echo e($row->nama); ?>"
		                			class="btn btn-aktif btn-xs btn-info" title="Click Untuk Meng-nonaktifkan">
		                				<i class="fa fa-check"></i> Aktif
		                			</a>
		                			<?php else: ?>
		                			<a href="#" 
		                			data-id="<?php echo e($row->gethashid()); ?>" 
		                			data-nama = "<?php echo e($row->nama); ?>"
		                			class="btn btn-aktif btn-xs btn-disable" title="Click Untuk Meng-aktifkan">
		                				Tidak Aktif
		                			</a>
		                			<?php endif; ?>
		                			
		              			</td>
		              			<td align="right">
		              				<a href="#" 
		                			data-image="<?php echo e($row->gambar); ?>" 
		                			data-nama = "<?php echo e($row->nama); ?>"
		                			data-kutipan = "<?php echo e($row->kutipan); ?>"
		                			class="btn btn-preview btn-xs btn-default" title="Detail">
		                				<i class="fa fa-search-plus"></i> Preview
		                			</a>

		                			<a href="#" 
		                			data-id="<?php echo e($row->gethashid()); ?>" 
		                			data-nama="<?php echo e($row->nama); ?>" 
		                			data-kutipan = "<?php echo e($row->kutipan); ?>"
		                			class="btn btn-edit btn-xs btn-success" title="Edit">
		                				<i class="fa fa-edit"></i> 
		                			</a>

		                			<a href="#" 
		                			data-id="<?php echo e($row->gethashid()); ?>" 
		                			data-nama = "<?php echo e($row->nama); ?>"
		                			class="btn btn-del btn-xs btn-danger" title="Hapus">
		                				<i class="fa fa-trash"></i>
		                			</a>


		              			</td>
		              		</tr>
		              	<?php endforeach; ?>
		              </tbody>
		            </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal PREVIEW -->
<div class="modal fade" id="modal-preview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog  modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel-preview"></h4>
	      </div>
	      <div class="modal-body" id="body-detail">
	      		<div class = "thumbnail">
                     <img width="100%" src = "" class="img-responsive" id="image-preview">
                     <div class="caption">
                     	 <p id="kutipan-preview"></p>
                     </div>
                </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
</div>



<!-- Modal EDIT -->
<form action="<?php echo e(URL::to('admin/header/update')); ?>" method="POST" enctype="multipart/form-data">
	<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Edit Header</h4>
	      </div>
	      <div class="modal-body" id="body-detail">
	      		 <?php echo e(csrf_field()); ?>

	      		 <input type="hidden" name="id_edit"  id="post_edit">
	        	<div class="row">
	        		<div class="col-md-12">
                        <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                            <label>Nama Header</label>
                            <input class="form-control" name="nama" id="edit_nama" placeholder="Masukan Nama " type="text">
                        </div>
                    </div>  
                    <div class="col-md-12">
                        <div class="form-group <?php if($errors->has('nama')): ?> has-error <?php endif; ?>">
                            <label>Kutipan</label>
                            <input class="form-control" name="kutipan" id="edit_kutipan" placeholder="Masukan Kutipan " type="text">
                        </div>
                    </div>  
	                    <div class="col-md-12">
	                        <div class="form-group">
	                            <label>Ganti Gambar (<small>Resolusi yang disarankan 1360x480 Ukuran Max 1M Pixel</small>)</label>
	                            <input  class="btn btn-default" type="file" name="file" accept=".png, .gif, .jpeg, .jpg" />
	                        </div>
	                    </div>        
		        	</div>	        		
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	        <button type="Submit" class="btn btn-success">Simpan</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>


<form action="<?php echo e(URL::to('admin/header/delete')); ?>" method="post" id="form-delete">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="post_id"  id="post_id">
</form>

<form action="<?php echo e(URL::to('admin/header/toggle/aktif')); ?>" method="post" id="form-aktif">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="post_id"  id="post_aktif">
</form>
<script type="text/javascript">
	$(function(){
         <?php if(Session::has('notice')): ?>
            Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
         <?php endif; ?>
         <?php if($errors->has()): ?>
                Notify.showAlert('<b>Terjadi Kesalahan</b>,  Periksa Inputan Form');
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
			        message: "Anda Yakin Ingin Menghapus Header: <br><strong>" + nama + "</strong>",
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
		     });

        $(".btn-aktif").on("click",function(){
		     	var post_id = $(this).attr('data-id');
		     	var nama = $(this).attr('data-nama');
		     	$("#post_aktif").val(post_id);

		     	    bootbox.confirm({
			        message: "Anda Yakin Ingin Meng-aktifkan/Meng-nonaktifkan Header: <br><strong>" + nama + "</strong>",
			        buttons: {
			            confirm: {
			                label: 'Ya',
			                className: 'btn-primary'
			            },
			            cancel: {
			                label: 'Batal',
			                className: 'btn-default'
			            }
			        },
			        callback: function (result) {
			        	if(!result) return;
			        	$("#form-aktif").submit();
			        	
			        }
			    });
		     });

        $(".btn-preview").on("click",function(){
	     	var gambar = "<?php echo e(URL::to('header')); ?>/" + $(this).attr('data-image');
	     	var kutipan = $(this).attr('data-kutipan');
	     	$("#image-preview").attr('src',gambar);
	     	$("#kutipan-preview").text(kutipan);
	     	$("#modal-preview").modal('show');
	     	$("#myModalLabel-preview").html($(this).attr('data-nama'));
		});

		$(".btn-edit").on("click",function(){
	     	$("#post_edit").val($(this).attr('data-id'));
	     	$("#edit_nama").val($(this).attr('data-nama'));
	     	$("#edit_kutipan").val($(this).attr('data-kutipan'));
	     	$("#modal-edit").modal('show');
		});


     })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>