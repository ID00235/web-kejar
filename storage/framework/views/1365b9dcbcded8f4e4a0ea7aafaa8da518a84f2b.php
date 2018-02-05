<h1>PPID Kabupaten Batang Hari</h1> <br>
<h2>Email Konfirmasi Permohonan</h2>
<p style="color:#000 !important;">
Selamat Datang <b><?php echo e($permohonan->nama_pemohon); ?></b>, <br>
Terima kasih telah mengajukan permohonan informasi ke PPID Kabupaten Batang Hari.
</p>
<p style="color:#000 !important;">
Silahkan Klik Tombol Konfirmasi dibawah ini agar permohonan informasi dapat kami proses lebih lanjut. <br>
</p>
<br>
<span style="border-radius: 3px; background: #bb6c62; text-align: left; width: 180px;" class="button-td">
    <a href="<?php echo e(URL::to('permohonan/konfirm/token/'.Crypt::encrypt($permohonan->nomor))); ?>" style="background: #1bbcc2; border: 15px solid #1bbcc2; font-family: sans-serif; font-size: 12px; line-height: 0.5; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a">
        &nbsp;&nbsp;<span style="color:#ffffff;">Konfirmasi Permohonan</span>&nbsp;&nbsp;
    </a>
</span><br>
<p style="color:#000 !important;">
Berikut kami sampaikan informasi singkat terkait permohonan anda <br>
Tanggal Pengajuan Permohonan:  <?php echo e(tanggal_indo2($permohonan->tanggal)); ?> <br>
Nama Pemohon :  <?php echo e($permohonan->nama_pemohon); ?> <br>
Alamat :  <?php echo e($permohonan->alamat); ?> <br>
Informasi yang diperlukan : "<i><?php echo e($permohonan->informasi_diperlukan); ?></i>"
</p>
<br>              

<p style="color:#000 !important; font-size: 10px;">
Untuk Kelancaran Pengiriman Email, Mohon untuk tidak membalas email ini.
</p>
<?php
            $setting = DB::table('setting')->first();
        ?>
<table role="presentation" aria-hidden="true" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td style="padding: 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
           <b><a  style="text-decoration: none; color:#1bbcc2" href="http://ppid.batangharikab.go.id">PPID Kabupaten Batanghari </a></b> <br>
           <p style="font-size: 12px; color:#000 !important; text-decoration: none !important;"><?php echo e($setting->alamat); ?><br>
           Email: <?php echo e($setting->email); ?> <br>Telepon: <?php echo e($setting->telepon); ?></p>
        </td>
        </tr>
</table>