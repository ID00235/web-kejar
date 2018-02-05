<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Permohonan Informasi</title>
        <body>
            <style type="text/css">
                @page  { margin-left: 70px; margin-right: 50px; font-family: 'Arial';font-size:1.09em !important;}
                body{
                     line-height: 19px;
                     
                }              

                table > tr > td {
                    font-family: 'Arial';
                    padding-top: 5px;
                    padding-bottom: 5px;
                    
                }

                small{
                    font-size: 0.75em !important;
                }
                big{
                    font-size: 1.25em !important;
                }

            </style>
            
            <div style="font-family: 'arial'; margin-top: 120px; line-height: 26px;">
                <center><h2>Pejabat Pengelola Informasi dan Dokumentasi (PPID) <br> PEMERINTAH DAERAH 
                KABUPATEN BATANG HARI</h2></center>
                <center><b>FORMULIR PERMOHONAN INFORMASI</b></center> <br> 
            </div>
            <table>
                 <tr>
                    <td style="width:220px;">No. Registrasi Permohonan</td>
                    <td style="width:5px;">:</td>
                    <td><b><?php echo e($permohonan->nomor); ?></b></td>
                </tr>
                <tr>
                    <td style="width:220px;">Tanggal Permohonan</td>
                    <td style="width:5px;">:</td>
                    <td><?php echo e(tanggal_indo2($permohonan->tanggal)); ?></td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td colspan="3"><b>A. Identitas Pemohon</b></td></tr>
                <tr>
                    <td style="width:220px;">Nama Pemohon</td>
                    <td style="width:5px;">:</td>
                    <td><?php echo e($permohonan->nama_pemohon); ?></td>
                </tr>  
                <tr>
                    <td >Alamat</td>
                    <td>:</td>
                    <td><?php echo e($permohonan->alamat); ?></td>
                </tr> 
                <tr>
                    <td >Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo e($permohonan->pekerjaan); ?></td>
                </tr> 
                <tr>
                    <td >Alamat Email</td>
                    <td>:</td>
                    <td><?php echo e($permohonan->email); ?></td>
                </tr>   
                <tr>
                    <td >No. Telepon</td>
                    <td>:</td>
                    <td><?php echo e($permohonan->telepon); ?></td>
                </tr> 
                <?php if($permohonan->dikuasakan): ?>
                <tr><td colspan="3"><b>Permohonan Dikuasakan Kepada*</b></td></tr>
                <tr>
                    <td style="width:220px;">Nama Penerima Kuasa</td>
                    <td style="width:5px;">:</td>
                    <td><?php echo e($permohonan->nama_kuasa); ?></td>
                </tr>  
                <tr>
                    <td >Alamat</td>
                    <td>:</td>
                    <td><?php echo e($permohonan->alamat_kuasa); ?></td>
                </tr> 
                <tr>
                    <td >Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo e($permohonan->pekerjaan_kuasa); ?></td>
                </tr> 
                <tr>
                    <td >No. Telepon</td>
                    <td>:</td>
                    <td><?php echo e($permohonan->telp_kuasa); ?></td>
                </tr> 
                <?php endif; ?>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td colspan="3"><b>B. Informasi Permohonan</b></td></tr> 
                <tr>
                    <td  valign="top">Rincian Informasi yang Dibutuhkan</td>
                    <td valign="top">:</td>
                    <td valign="top">
                    <?php if(strlen($permohonan->informasi_diperlukan) <100): ?>
                    <i><?php echo e($permohonan->informasi_diperlukan); ?></i>
                    <?php else: ?>
                    <small><i><?php echo e($permohonan->informasi_diperlukan); ?></i></small>
                    <?php endif; ?>
                    </td>
                </tr> 
                <tr>
                    <td  valign="top">Tujuan Penggunaan Informasi</td>
                    <td valign="top">:</td>
                    <td valign="top"><?php echo e($permohonan->informasi_tujuan); ?></td>
                </tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td colspan="3"><b>C. Cara Memperoleh dan Mendapatkan Informasi</b></td></tr> 
                <tr>
                    <td  valign="top">Cara Memperoleh Informasi</td>
                    <td valign="top">:</td>
                    <td valign="top"><?php echo e($permohonan->cara_memperoleh); ?></td>
                </tr>
                <tr>
                    <td  valign="top">Cara Mendapatkan Salinan Informasi</td>
                    <td valign="top">:</td>
                    <td valign="top"><?php echo e($permohonan->cara_mendapatkan); ?></td>
                </tr>       
            </table>
            <br>
            <p style="text-align: right">_______________________, ___________________________________</p>
            <table width="100%">
                <tr>
                    <td style="width:190px;" rowspan="2" valign="top">
                    <img src="<?php echo e(asset("generate-qrcode/permohonan/".Hashids::encode($permohonan->id))); ?>" ></td>
                    <td align="center">Petugas Pelayanan Informasi</td>
                    <td></td>
                    <td align="center" style="width:280px;">Pemohon Informasi</td>
                </tr> 
                <tr>
                    <td align="center">______________________</td>
                    <td>&nbsp;</td>
                    <td align="center"><b><?php echo e(strtoupper($permohonan->nama_pemohon)); ?></b></td>
                </tr> 
                <tr>
                    <td colspan="4" align="left">
                        <small>Scan QRCode untuk cek status permohonan</small><br>
                        <?php if($permohonan->dikuasakan): ?>
                         <small>*surat kuasa dilampirkan</small>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
            
        </body>
    </head>
</html>