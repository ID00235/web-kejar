<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth','middleware' => 'role:admin||operator'], function () {
		Route::get('/',function () {return Redirect::to('admin/home');});
		Route::get('/home',"Backend\HomeController@index");
		//GENERATE KODE AKSES
		//Route::get('/genakses',"Backend\HomeController@genAkses");

		
		
		Route::post('/upload-gambar',"Backend\GalleryController@uploadgambar");
        
    	//GALLERY
        Route::group(['prefix' => 'gallery'], function () {
            Route::get('/',"Backend\GalleryController@index");
            Route::get('/list-photo',"Backend\GalleryController@listphoto");
            Route::get('/detailphoto/{id}',"Backend\GalleryController@detailphoto");

            
            Route::post('/storephoto',"Backend\GalleryController@storephoto");
            Route::post('/updatephoto',"Backend\GalleryController@updatePhoto");
            Route::post('/deletephoto',"Backend\GalleryController@deletephoto");
            
            Route::post('/storevideo',"Backend\GalleryController@storevideo");
            Route::post('/deletevideo',"Backend\GalleryController@deletevideo");
            Route::post('/updatevideo',"Backend\GalleryController@updatevideo");
            
            
        });

		

		//ROUTER HEADER
		Route::group(['prefix' => 'header' , 'middleware' => 'role:admin'], function () {
			Route::get('/',"Backend\HeaderController@index");
			Route::get('/baru',"Backend\HeaderController@baru");
			Route::post('/store',"Backend\HeaderController@store");
			Route::post('/update',"Backend\HeaderController@update");
			Route::post('/delete',"Backend\HeaderController@delete");
			Route::post('/toggle/aktif',"Backend\HeaderController@aktivasi");
		});


		//ROUTER BERITA   
		Route::group(['prefix' => 'berita', 'middleware' => 'role:admin' ], function () {
			Route::get('/',"Backend\BeritaController@index");
			Route::get('/baru',"Backend\BeritaController@baru");
			Route::get('/detail/{cid}',"Backend\BeritaController@detail");
			Route::get('/edit/{cid}',"Backend\BeritaController@edit");
			Route::post('/insert',"Backend\BeritaController@insert");
			Route::post('/update/{cid}',"Backend\BeritaController@update");
			Route::post('/delete',"Backend\BeritaController@delete");
		});
    
        
		//ROUTER PROFIL   
		Route::group(['prefix' => 'profil' , 'middleware' => 'role:admin'], function () {
			Route::get('/',"Backend\ProfilController@index");
			Route::get('/baru',"Backend\ProfilController@baru");
			Route::get('/detail/{cid}',"Backend\ProfilController@detail");
			Route::get('/edit/{cid}',"Backend\ProfilController@edit");
			Route::post('/store',"Backend\ProfilController@store");
			Route::post('/update/{cid}',"Backend\ProfilController@update");
			Route::post('/delete',"Backend\ProfilController@delete");
		});

		//ROUTER PROFIL   
		Route::group(['prefix' => 'informasi' , 'middleware' => 'role:admin'], function () {
			Route::get('/',"Backend\InformasiController@index");
			Route::get('/baru',"Backend\InformasiController@baru");
			Route::get('/detail/{cid}',"Backend\InformasiController@detail");
			Route::get('/edit/{cid}',"Backend\InformasiController@edit");
			Route::post('/store',"Backend\InformasiController@store");
			Route::post('/update/{cid}',"Backend\InformasiController@update");
			Route::post('/delete',"Backend\InformasiController@delete");
		});

		//ROUTER PROFIL   
		Route::group(['prefix' => 'dataangka' , 'middleware' => 'role:admin'], function () {
			Route::get('/',"Backend\DataAngkaController@index");
			Route::get('/baru',"Backend\DataAngkaController@baru");
			Route::get('/detail/{cid}',"Backend\DataAngkaController@detail");
			Route::get('/edit/{cid}',"Backend\DataAngkaController@edit");
			Route::post('/store',"Backend\DataAngkaController@store");
			Route::post('/update/{cid}',"Backend\DataAngkaController@update");
			Route::post('/delete',"Backend\DataAngkaController@delete");
		});


		//ROUTER AGENDA   
		Route::group(['prefix' => 'agenda' , 'middleware' => 'role:admin'], function () {
			Route::get('/',"Backend\AgendaController@index");
			Route::get('/detail/{id}',"Backend\AgendaController@detail");
			Route::post('/store',"Backend\AgendaController@store");
			Route::post('/update/{cid}',"Backend\AgendaController@update");
			Route::post('/delete',"Backend\AgendaController@delete");
			Route::get('/list-agenda',"Backend\AgendaController@listagenda");
		});

		//ROUTER PROFIL KELURAHAN  
		Route::group(['prefix' => 'kelurahan' , 'middleware' => 'role:admin'], function () {
			Route::get('/',"Backend\KelurahanController@index");
			Route::get('/baru',"Backend\KelurahanController@baru");
			Route::get('/detail/{cid}',"Backend\KelurahanController@detail");
			Route::get('/edit/{cid}',"Backend\KelurahanController@edit");
			Route::post('/store',"Backend\KelurahanController@store");
			Route::post('/update/{cid}',"Backend\KelurahanController@update");
			Route::post('/delete',"Backend\KelurahanController@delete");
		});


		//ROUTER Pengguna  
		Route::group(['prefix' => 'pengguna','middleware' => 'role:admin'], function () {
			Route::get('/',"Backend\PenggunaController@index");
			Route::get('/baru',"Backend\PenggunaController@baru");
			Route::get('/detail/{cid}',"Backend\PenggunaController@detail");
			Route::get('/edit/{cid}',"Backend\PenggunaController@edit");
			Route::post('/store',"Backend\PenggunaController@store");
			Route::post('/update/{cid}',"Backend\PenggunaController@update");
			Route::post('/delete',"Backend\PenggunaController@delete"); 
		});

		

		//PENGATURAN AKUN USER
		Route::get('akun','Backend\AkunController@index');
		Route::post('akun/update/{cid}','Backend\AkunController@update');

		//PENGATURAN SETTING APP
		Route::group(['middleware' => 'role:admin'], function () {
			Route::get('setting','Backend\SettingController@index');
			Route::post('setting/update','Backend\SettingController@update');
		});


		Route::get('sendmail',function(){
			set_time_limit(2000);
			Mail::send('email.konfirmasi', ["permohonan"=>$permohonan], function ($m){
	            $m->from('no-reply@batangharikab.go.id', 'No Reply -  Kab. Batanghari');
	            $m->to('irwanka.email@gmail.com', "Irwan Kurniawan")
	            ->subject('Konfirmasi Permohonan Informasi Nomor '. $permohonan->nomor);
	        });
		});

});

Route::get('/logout',function(){
		Auth::logout();
		return Redirect::to('/login');
});