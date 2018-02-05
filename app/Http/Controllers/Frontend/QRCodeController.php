<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Frontend\Controller as MainControler;
use Redirect;
use DB;
use Crypt;
use URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QRCodeController extends MainControler
{

		public function permohonan($token){

			$url = URL::to("/permohonan/cekstatus?token=$token");
			return QrCode::format('png')->size(190)->generate($url);

		}
}
