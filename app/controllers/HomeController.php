<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	

	public function getIndex()
	{
		return View::make('index');
	}

	

	public function postIndex()
	{
		$data = Input::all('search');
		$rules = array(
			'search' => 'required|alpha_num|min:3'
		);
		//Validator used to check the search input has at least 3 characters
		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Response::json(array('key' => 'nok'));
		} else {
			$match = Input::get('search');
	    	$results = DB::table('books')->leftJoin('authors', 'books.author_id', '=', 'authors.id')
	    								->where('title', 'like', '%'.$match.'%')
	    								->orWhere('isbn', 'like', '%'.$match.'%')
	    								->orWhere('firstname', 'like', '%'.$match.'%')
	    								->orWhere('lastname', 'like', '%'.$match.'%')
	    								->get();
	    	if ($results){
	    		return Response::json(array('key' => $results));
	    	}
			else {
				//If not results found, send 'empty' to be treated after
				return Response::json(array('key' => 'empty'));
			}
		}
	}

}