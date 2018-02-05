
<?php

	 function namaBulan($bulan){
        $nama_bulan = array(" ","Januari", "Februari", "Maret","April","Mei", "Juni" , "Juli", "Agustus", "September","Oktober","November", "Desember");
        return $nama_bulan[$bulan];
    }

      function namaBulanSingkat($bulan){
        $bulan = (int)$bulan;
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $nama_bulan[$bulan];
    }

     function rupiah($nilai){
        return number_format($nilai, "2", ",", ".");
    }

      function cuttext($text){
        if (strlen($text)> 70){
            return substr($text, 0,70)."...";
        }else{
            return $text;
        }
    }

     function cuttext50($text){
        if (strlen($text)> 50){
            return substr($text, 0,50)."...";
        }else{
            return $text;
        }
    }


    function cuttext80($text){
        if (strlen($text)> 80){
            return substr($text, 0,80)."...";
        }else{
            return $text;
        }
    }


     function cuttext30($text){
        if (strlen($text)> 40){
            return substr($text, 0,40)."...";
        }else{
            return $text;
        }
    }


     function cuttext120($text){
        if (strlen($text)> 120){
            return substr($text, 0,120)."...";
        }else{
            return $text;
        }
    }
    function generate_url($text){
    	$text  = explode("/",$text);
    	$text = $text[0];
        $text = strtolower(trim($text));
        $txt = str_replace(array(':', '\\', '/', '*'),"-",$text);
        $txt = str_replace(" ","-",$text);
        return $txt;
    }

     function tanggalIndo($tgl_en){
        $tgl = explode("-", $tgl_en);
        return $tgl[2]."/".$tgl[1]."/".$tgl[0];
    }

     function tanggalSystem($tgl_en){
        $tgl = explode("/", $tgl_en);
        return $tgl[2]."-".$tgl[1]."-".$tgl[0];
    }

    function timestamp_indo($timestamp){
        $timestamp = trim($timestamp);
        $time = explode(" ", $timestamp);
        $tanggal = explode("-", $time[0]);
        $jam = $time[1];
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $tanggal[2]." ".$nama_bulan[(int)$tanggal[1]]. " ". $tanggal[0] ." ". $jam;
    }
    
     function timestamp_indo2($timestamp){
            $timestamp = trim($timestamp);
            $time = explode(" ", $timestamp);
            $tanggal = explode("-", $time[0]);
            $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
            return $tanggal[2]." ".$nama_bulan[(int)$tanggal[1]]. " ". $tanggal[0] ;
        }
     function tanggal_singkat_indo($date){
        $date = explode("-", $date);
        $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
        return $date[2]." ".$nama_bulan[(int)$date[1]]. " ". $date[0];
    }

    function tanggal_indo2($date){
         $date = explode("-", $date);
         $nama_bulan = array(" ","Januari", "Februari", "Maret","April","Mei", "Juni" , "Juli", "Agustus", "September","Oktober","November", "Desember");
        return $date[2]." ".$nama_bulan[(int)$date[1]]. " ". $date[0];
    }

    function get_tanggal($date){
            $date = explode("-", $date);
            return $date[2];
    }

    function get_bulan($date){
            $date = explode("-", $date);
            $bulan = (int) $date[1];
            $nama_bulan = array(" ","Jan", "Feb", "Mar","Apr","Mei", "Jun" , "Jul", "Agu", "Sep","Okt","Nov", "Des");
            return $nama_bulan[$bulan];
    }

    function youtube_id($url){
        $url = explode("/",$url);
        $id = "";
        if(count($url)>0){
            $id = $url[count($url)-1];   
        }
        return $id;
    }

    function gettextdeskripsi($text){

        $text = strip_tags($text);
        return substr($text, 0,110)."..";
    }

    function gettextdeskripsi2($text){

        $text = strip_tags($text);
        return substr($text, 0,160)."..";
    }
    
    function addClassImages($konten){

       $pattern ="/<img(.*?)alt=\"(.*?)\"(.*?)>/i";
       $replacement = '<img$1class="$2 img-responsive rounded img-shadow img-fluid"$3>';
       $content = preg_replace($pattern, $replacement, $konten);
       return $content;
     }

     function addClassTable($konten){

       $pattern ="/<table(.*?)>/i";
       $replacement = '<table$1class="$2 table table-responsive table-bordered table-striped"$3>';
       $content = preg_replace($pattern, $replacement, $konten);
       return $content;
     }

