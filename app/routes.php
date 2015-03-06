<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::match(array('GET', 'POST'), '/incoming', function()
{
	$twiml = new Services_Twilio_Twiml();
	$twiml->say('Hello - your app just answered the phone. Neat, eh?', array('voice' => 'alice'));
	$response = Response::make($twiml, 200);
	$response->header('Content-Type', 'text/xml');
	return $response;
});

Route::get('/', function()
{
	return View::make('home');
});

Route::post('/text', function()
{
  	// Get form inputs
  	$number = Input::get('number');
  	$message = Input::get('message');
 
  	// Create an authenticated client for the Twilio API
  	$client = new Services_Twilio($_ENV['TWILIO_ACCOUNT_SID'], $_ENV['TWILIO_AUTH_TOKEN']);
 	
 	try {
	  	// Use the Twilio REST API client to send a text message
	  	$m = $client->account->messages->create(
	    	$_ENV['TWILIO_NUMBER'], // the text will be sent from your Twilio number
	    	$number, // the phone number the text will be sent to
	    	$message // the body of the text message
	  	);
	}catch(Services_Twilio_RestException $e) {
    	// Return and render the exception object, or handle the error as needed
    	return $e;
  	};

  	// Return the message object to the browser as JSON
  	return $m;
});