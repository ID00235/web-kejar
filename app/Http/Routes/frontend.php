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
Route::get('/pass',function(){
	return Hash::make('123456sdggsd');
});

Route::get('/','Frontend\HomeController@index');


//BERITA
Route::get('baca/{id}/{title}/{tanggal}','Frontend\BeritaController@baca');
Route::get('semua-berita','Frontend\BeritaController@semua');
Route::get('semua-agenda','Frontend\HalamanController@semuaagenda');

//PENGUMUMAN
Route::get('baca-pengumuman/{id}/{title}','Frontend\PengumumanController@baca');
Route::get('semua-pengumuman','Frontend\PengumumanController@semua');


//Gallery
Route::get('gallery-photo','Frontend\GalleryController@photo');

//PROFIL
Route::get('profil/{id}/{nama}','Frontend\ProfilController@index');

//PROFIL
Route::get('organisasi/{id}/{nama}','Frontend\OrganisasiController@index');

Route::get('peraturan','Frontend\PeraturanController@index');
Route::get('konsultasi','Frontend\KonsultasiController@index');



Route::group(['prefix' => 'login'], function()
{
	Route::resource('/',"Frontend\LoginController@index");
	Route::post('submitlogin',"Frontend\LoginController@submitlogin");

});


#Route::get('create-user',function(){
#	$user = new User;
#	$user->username= "admin";
#	$user->password = Hash::make('ppid.batanghari');
#	$user->save();
#});



