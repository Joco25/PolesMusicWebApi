<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use JWTAuth;
use App\Song;
use Dingo\Api\Routing\Helpers;
use Symphony\Component\HttpFoundation\File\UploadedFile;

class SongController extends Controller
{
	use Helpers;
    //
    
    public function uploadSong(Request $request)
	{
	    $currentUser = JWTAuth::parseToken()->authenticate();

	    //Ensure that user is an artist
	    if($currentUser->userable)
	    {

	    	$has = $request->hasFile('music');
	    	if($has)
	    	{
	    		$file = $request->file('music');

	    		return [
	    			'path' => $file->getRealPath(),
	    			'size' => formatSizeUnits($file->getSize()),
	    			'mime' => $file->getMimeType(),
	    			'name' => $file->getClientOriginalName(),
	    			'extension' => $file->getClientOriginalExtension()
	    		];

	    		return "true";
	    	}
	    	return $request->name;
	    	return $currentUser->userable;

	    }
	    else return $this->response->error('unauthorized_user', 401);

	    

	    return $this->response->error('could_not_create_book', 500);

	    return $this->response($currentUser);

	    /*$book = new Book;

	    $book->title = $request->get('title');
	    $book->author_name = $request->get('author_name');
	    $book->pages_count = $request->get('pages_count');
*/
	    if($currentUser->books()->save($book))
	        return $this->response->created();
	    else
	        return $this->response->error('could_not_create_book', 500);
	}
}
