<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Permohonan Informasi</title>
        <body>
            <style type="text/css">
                @page { margin-left: 70px; margin-right: 50px; font-family: 'Arial';font-size:1.09em !important;}
                body{
                     line-height: 22px;
                     
                }              

                table > tr > td {
                    font-family: 'Arial';
                    padding-top: 5px;
                    padding-bottom: 5px;
                    
                }

                small{
                    font-size: 0.8em !important;
                }
                big{
                    font-size: 1.25em !important;
                }

            </style>
            
            <div style="font-family: 'arial'; margin-top: 120px; line-height: 26px;">
                <center><h2>Pejabat Pengelola Informasi dan Dokumentasi (PPID) <br> PEMERINTAH DAERAH 
                KABUPATEN BATANG HARI</h2></center>
                <hr>
                <center><b>PERNYATAAN KEBERATAN ATAS PERMOHONAN INFORMASI</b></center>  
            </div>
            <p>&nbsp;</p>
            <p><b>A. INFORMASI PENGAJU KEBERATAN </b></p>
            <table>
                <tr>
                    <td style="width:220px;">No. Reg. Keberatan</td>
                    <td style="width:5px;">:</td>
                    <td>{{$keberatan->nomor}}</td>
                </tr>
                <tr>
                    <td style="width:220px;">Tanggal Pengajuan Keberatan</td>
                    <td style="width:5px;">:</td>
                    <td>{{tanggal_indo2($keberatan->tanggal)}}</td>
                </tr>
                <tr>
                    <td style="width:220px;">No. Reg. Permohonan Informasi</td>
                    <td style="width:5px;">:</td>
                    <td>{{$keberatan->nomor_permohonan}}</td>
                </tr>
                <tr>
                    <td style="width:220px;">Tanggal Permohonan Informasi</td>
                    <td style="width:5px;">:</td>
                    <td>
                        <?php
                        $permohonan = $keberatan->getpermohonan();
                        ?>
                        @if($permohonan)
                            {{tanggal_indo2($permohonan->tanggal)}}
                        @else
                        Tidak Ditemukan
                        @endif
                    </td>
                </tr>
                <tr>
                    <td  valign="top">Tujuan Penggunaan Informasi</td>
                    <td valign="top">:</td>
                    <td valign="top">{{$keberatan->informasi_tujuan}}</td>
                </tr>  
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr>
                    <td colspan="3"><b>Identitas Pemohon</b></td>
                </tr>
                <tr>
                    <td style="width:220px;">Nama Pemohon</td>
                    <td style="width:5px;">:</td>
                    <td>{{$keberatan->nama_pemohon}}</td>
                </tr>  
                <tr>
                    <td >Alamat</td>
                    <td>:</td>
                    <td>{{$keberatan->alamat_pemohon}}</td>
                </tr> 
                <tr>
                    <td >Pekerjaan</td>
                    <td>:</td>
                    <td>{{$keberatan->pekerjaan_pemohon}}</td>
                </tr> 
                <tr>
                    <td >No. Telepon</td>
                    <td>:</td>
                    <td>{{$keberatan->telp_pemohon}}</td>
                </tr> 
                @if($keberatan->dikuasakan)
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3"><b>Identitas Kuasa Pemohon <small>(Surat Kuasa Terlampir)</small></b></td>
                </tr>
                <tr>
                    <td style="width:220px;">Nama Kuasa Pemohon</td>
                    <td style="width:5px;">:</td>
                    <td>{{$keberatan->nama_kuasa}}</td>
                </tr>  
                <tr>
                    <td >Alamat</td>
                    <td>:</td>
                    <td>{{$keberatan->alamat_kuasa}}</td>
                </tr> 
                <tr>
                    <td >Pekerjaan</td>
                    <td>:</td>
                    <td>{{$keberatan->pekerjaan_kuasa}}</td>
                </tr> 
                <tr>
                    <td >No. Telepon</td>
                    <td>:</td>
                    <td>{{$keberatan->telp_kuasa}}</td>
                </tr>    
                @endif
            </table>
            <p>&nbsp;</p>
            <p><b>B. Alasan Pengajuan Keberatan</b></p>
            <table style="width: 100%">
                <tr>
                    <td>
                        <i style="background-color: #f6f59a !important;">{{$keberatan->alasan_keberatan}}</i>
                    </td>
                </tr>
            </table>
            @if($keberatan->keterangan)
            Keterangan Tambahan : 
            <?php echo $keberatan->keterangan;?>
            @endif
            <p>&nbsp;</p>
            <p style="text-align: right">_______________________, ___________________________________</p>
            <table width="100%">
                <tr>
                    <td style="width:190px;" rowspan="4" valign="top">
                    </td>
                    <td align="center">Petugas Informasi <br> (Penerima Keberatan)</td>
                    <td></td>
                    <td align="center" style="width:280px;">Pengaju Keberatan</td>
                </tr> 
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">_____________________</td>
                    <td>&nbsp;</td>
                    <td align="center"><b>_____________________</b></td>
                </tr> 
            </table>
        </body>
    </head>
</html>