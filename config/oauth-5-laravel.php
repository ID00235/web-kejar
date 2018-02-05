<?php

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => '\\OAuth\\Common\\Storage\\Session',

	/**
	 * Consumers
	 */
	'consumers' => [

		'Facebook' => [
			'client_id'     => '',
			'client_secret' => '',
			'scope'         => [],
		],
		'Google' => [
		    'client_id'     => '183229977151-185hbdtr34i8itoeh242ntasl9sn9io5.apps.googleusercontent.com',
		    'client_secret' => 'dazWs7AY4lky4iDbjYG2whAD',
		    'redirect_url'	=> 'http://jdih.dev.com/ppid-final/public/googleauth',
		    'scope'         => ['userinfo_email', 'userinfo_profile'],
		],	

	]

];