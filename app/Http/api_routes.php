<?php
	
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	
	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');


	$api->group(['middleware' => 'api.auth'], function ($api) {
		$api->post('songs/upload', 'App\Api\V1\Controllers\SongController@uploadSong');
	});

	// example of protected route
	$api->get('protected', ['middleware' => ['api.auth'], function () {		
		return \App\User::all();
    }]);

	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});

});

//API Routes Documentation
//Add Documentation for each routes added below

//1. Auth/Login

/**
	 *@api {POST} /auth/login  User Login
	 *@apiName Login User
	 *@apiGroup Authentication
	 *@apiDescription This Endpoint is responsible for login. Users/Artists
	 *@apiParam {String} email User email
	 *@apiParam {String} password User Password
	 *
	 *
	 *@apiSuccess {String} token A token is returned. This token should be sent with every request
	 *
	 * @apiSuccessExample Success-Response:
	 *     {
			  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMsImlzcyI6Imh0dHA6XC9cL2xvY2FsLXdlYjo4MDgwXC9wb2xlc1wvcHVibGljXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoxNDcxNDM0Mzg3LCJleHAiOjE0NzE1MjA3ODcsIm5iZiI6MTQ3MTQzNDM4NywianRpIjoiZTkxMTdjOGY0ZWI2YmNiMGZkMGUwNmJjYWVjNzRhNzcifQ.KB6S1h8jQU5k7xFquUZC4e3TRA3YpiQ0gfrHb_rf0rU"
			}
	 *
	 *
	 * @apiError {string} message Error message
	 * @apiError {integer} status_code A status code to go with the error
	 * @apiError {array} errors Array of errors
	 *
*/