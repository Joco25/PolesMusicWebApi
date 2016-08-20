<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mhor\PhpMp3Info\PhpMp3Info;
use App\Http\Requests;
use JWTAuth;
use App\Song;
use Dingo\Api\Routing\Helpers;
use Symphony\Component\HttpFoundation\File\UploadedFile;
use App\Classes\Common;

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
	    	$artist = $currentUser->userable;
	    	if($request->hasFile('music'))
	    	{
	    		$file = $request->file('music');
	    		$details = Common::getMusicDetail($file);


	    		$song = new Song;

	    		$song->artist_id = $artist->id;
	    		$song->name = $request->name;
	    		$song->length = $details['playtime'];
	    		$song->bitrate = $details['bitrate'];
	    		$song->genre_id = $request->genre_id;
	    		$song->price = $request->price;
	    		$song->size = formatSizeUnits($file->getSize());



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
