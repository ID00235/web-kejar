<?php $__env->startSection('javascript'); ?>
    @parent
    <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 <?php
    $url_cetak = URL::to("permohonan/cetak-permohonan")."/".Crypt::encrypt($permohonan->id);
    $url_edit = URL::to("admin/permohonan/edit")."/".Crypt::encrypt($permohonan->id);
    $user = Auth::user();
?>
<div class="row">
    <div class="col-md-12">
        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title"><i class="fa fa-address-card-o"></i> Permohonan Informasi</div>
                <div class="panel-options">
                  <?php if(!$permohonan->online): ?>
                      <?php if($user->usertype=='admin' || $user->ppid_pembantu == $permohonan->ppid_pembantu): ?>
                      <a href="#" id="btn-cancel" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batalkan Permohonan</a>
                      <a href="<?php echo e($url_edit); ?>" data-rel="reload" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Ubah Permohonan</a>
                      <?php endif; ?>
                  <?php endif; ?>
                  <a href="<?php echo e($url_cetak); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i> Cetak Permohonan</a> &nbsp;&nbsp;
                  <a href="<?php echo e(URL::to("admin/permohonan")); ?>" data-rel="reload" class="btn btn-default btn-sm"><i class="fa fa-angle-left"></i> Ke Daftar Permohonan</a>
                </div>
            </div>
            <?php
                $status=array(
                "1"=>"<span class='label label-gray'>Belum diproses</span>",
                "2"=>"<span class='label label-danger'>Ditolak</span>",
                "99"=>"<span class='label label-warning'>Menunggu Konfirmasi</span>",
                "3"=>"<span class='label label-default'>Klarifikasi</span>",
                "4"=>"<span class='label label-info'>Sedang Diproses</span>",
                "5"=>"<span class='label label-success'>Proses Selesai</span>",
                );
            ?>
            <div class="panel-body">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home">Detail Permohonan</a></li>
              <li><a data-toggle="tab" href="#menu1">Riwayat Status Permohonan</a></li>
            </ul>

            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                <p>&nbsp;</p>
                <?php if($permohonan->online): ?>
                    <p class="pull-right">Permohonan Via Website (Online)</p>
                <?php else: ?>
                    <p class="pull-right">Permohonan Langsung/Manual (Offline)</p>
                <?php endif; ?>
                 <table class="table table-condensed table-striped " style="border: none;">
                    <tr>
                        <td><b>Status Permohonan</b></td>
                        <td>:</td>
                        <td><?php echo $status[$permohonan->status];?></td>
                    </tr>
                    <tr>
                        <td width="25%">Nomor</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->nomor); ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Tanggal</td>
                        <td width="5px">:</td>
                        <td><?php echo e(tanggal_indo2($permohonan->tanggal)); ?></td>
                    </tr>
                    <tr><td colspan="3">&nbsp;</td></tr>
                    <tr><td colspan="3"><b>Identitas Pemohon</b></td></tr>
                     <tr>
                        <td width="15%">Nama Pemohon</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->nama_pemohon); ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Nomor Identitas</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->nomor_identitas); ?></td>
                    </tr>
                     <tr>
                        <td width="15%">Alamat</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->alamat); ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Pekerjaan</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->pekerjaan); ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Email</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->email); ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Telepon</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->telepon); ?></td>
                    </tr>
                    <?php if($permohonan->dikuasakan): ?>
                    <tr><td colspan="3">&nbsp;</td></tr>
                    <tr><td colspan="3"><b>Permohonkan Dikuasakan Kepada: <br><small>(surat kuasa dilampirkan)</small></b></td></tr>
                     <tr>
                        <td width="15%">Nama Penerima Kuasa</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->nama_kuasa); ?></td>
                    </tr>
                     <tr>
                        <td width="15%">Alamat</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->alamat_kuasa); ?></td>
                    </tr>
                     <tr>
                        <td width="15%">Pekerjaan</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->pekerjaan_kuasa); ?></td>
                    </tr>
                    <tr>
                        <td width="15%">Telepon</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->telp_kuasa); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr><td colspan="3">&nbsp;</td></tr>
                    <tr><td colspan="3"><b>Permohonan Informasi</b></td></tr>
                    <tr>
                        <td width="15%">Informasi yang diperlukan</td>
                        <td width="5px">:</td>
                        <td>"<i><?php echo e($permohonan->informasi_diperlukan); ?></i>"</td>
                    </tr>
                    <tr>
                        <td width="15%">Tujuan Penggunaan Informasi </td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->informasi_tujuan); ?></td>
                    </tr>
                    <tr><td colspan="3">&nbsp;</td></tr>
                    <tr><td colspan="3"><b>Cara Memperoleh & Mendapatkan Informasi</b></td></tr>
                    <tr>
                        <td width="15%">Cara Memperoleh</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->cara_memperoleh); ?></td>
                    </tr> 
                    <tr>
                        <td width="15%">Cara Mendapatkan</td>
                        <td width="5px">:</td>
                        <td><?php echo e($permohonan->cara_mendapatkan); ?></td>
                    </tr> 
                </table>
              </div>
              <div id="menu1" class="tab-pane fade">
                    <?php
                        $proses = DB::table('proses_permohonan')->where('permohonan',$permohonan->id)->orderby('updated_at','desc')->get();
                    ?>
                    <p>&nbsp;</p>
                    <a href="#" data-toggle="modal" data-target="#modal-tindak" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Catatan (Proses/Tindak Lanjut)</a>
                    <p>&nbsp;</p>
                     <ul class="list-group">
                    <?php foreach($proses as $ps): ?>
                      <li class="list-group-item">
                          <small><i class="fa fa-calendar"></i> <?php echo e(timestamp_indo($ps->updated_at)); ?></small>
                          <?php if($ps->status<>1): ?>
                          <a href="#" data-id="<?php echo e(Hashids::encode($ps->id)); ?>" class="btn btn-del-status btn-default btn-xs pull-right"><i class="fa fa-trash"></i> Hapus</a>
                          <?php endif; ?>
                          <div class="row">
                              <span class="col-md-10">
                                <p><?php echo $ps->isi;?></p>
                              </span>
                              <span class="col-md-2">
                                  <br>
                                  <span class="pull-right"><?php echo $status[$ps->status];?></span>
                              </span>
                          </div>

                      </li>
                    <?php endforeach; ?>
                    </ul>
              </div>              
            </div>            
            </div>
        </div>
    </div>
</div>

<form action="<?php echo e(URL::to('admin/permohonan/delete-status')); ?>" method="post" id="form-delete">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="_token">
    <input type="hidden" name="post_id"  id="post_id">
</form>
<form action="<?php echo e(URL::to('admin/permohonan/cancel-permohonan')); ?>" method="post" id="form-cancel">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="_token">
    <input type="hidden" name="post_id"  value="<?php echo e(Crypt::encrypt($permohonan->id)); ?>">
</form>
<!-- Modal -->
<form class="form" method="post" action="<?php echo e(URL::to('admin/permohonan/tindaklanjut/'.Crypt::encrypt($permohonan->id))); ?>">
<div class="modal fade" id="modal-tindak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-large" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Catatan Status Permohonan Informasi</h4>
      </div>
      <div class="modal-body" id="body-detail">
        <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Pilih Status Permohonan</label>
                        <?php
                            $status = DB::table('status_permohonan')->whereRaw("id<99")->get();
                        ?>
                        <select class="form-control select2 " id="filter_status" name="status" style="width: 100%;">
                            <option value=""></option>
                            <?php foreach($status as $k): ?>
                            <option value="<?php echo e($k->id); ?>"><?php echo e($k->nama); ?></option>
                            <?php endforeach; ?>
                        </select>                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Tambahkan Catatan</label>
                        <textarea id="editor" name="isi" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                <b>Periksa Kembali  Status dan Catatan, Pastikan Telah Terisi Dengan Benar dan Sesuai</b>
                </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Kirim</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>

<script type="text/javascript">
    $(function(){
         <?php if(Session::has('notice')): ?>
            Notify.showNotice('<?php echo e(Session::get('notice')); ?>');
         <?php endif; ?>

         <?php if($errors->has()): ?>
            Notify.showAlert('Terjadi Kesalahan Pengisian Status Permohonan');
         <?php endif; ?>

         CKEDITOR.replace('editor')
       
        $(".btn-del-status").on("click",function(){
            var post_id = $(this).attr('data-id');
            $("#post_id").val(post_id);
                bootbox.confirm({
                message: "Anda Yakin Ingin Menghapus Catatan Status?",
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

        $("#btn-cancel").on("click",function(){
            bootbox.confirm({
                message: "Anda Yakin Ingin Membatalkan Permohonan Informasi?",
                buttons: {
                    confirm: {
                        label: 'Ya, Batalkan',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Tutup',
                        className: 'btn-default'
                    }
                },
                callback: function (result) {
                    if(!result) return;
                    $("#form-cancel").submit();
                }
            });
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>