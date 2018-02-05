<h1>PPID Kabupaten Batang Hari</h1> <br>
<h2>Pemberitahuan Permohonan</h2>
<p style="color:#000 !important;">
<b><?php echo e($permohonan->nama_pemohon); ?></b>, <br>
Telah mengajukan permohonan informasi ke PPID Kabupaten Batang Hari.
</p>
<p style="color:#000 !important;">
Berikut Informasi singkat terkait permohonan tersebut <br>
<blockquote>
Tanggal Pengajuan:  <?php echo e(tanggal_indo2($permohonan->tanggal)); ?> <br>
Nama Pemohon :  <?php echo e($permohonan->nama_pemohon); ?> <br>
Alamat :  <?php echo e($permohonan->alamat); ?> <br>
Informasi yang diperlukan : "<i><?php echo e($permohonan->informasi_diperlukan); ?></i>"
</blockquote>
</p>
<br>             
<?php
$id_hash = Hashids::encode($permohonan->id);
$url_detail = URL::to("admin/permohonan/detail")."/".$id_hash ;
?>
<span style="border-radius: 3px; background: #bb6c62; text-align: center;" class="button-td">
    <a href="<?php echo e($url_detail); ?>" style="background: #1bbcc2; border: 15px solid #1bbcc2; font-family: sans-serif; font-size: 12px; line-height: 0.5; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
        &nbsp;&nbsp;<span style="color:#ffffff;">Lihat Detail Permohonan di Dashboard Admin</span>&nbsp;&nbsp;
    </a>
</span>
<p style="color:#000 !important; font-size: 10px;">
Untuk Kelancaran Pengiriman Email, Mohon untuk tidak membalas email ini.
</p>
