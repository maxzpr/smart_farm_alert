<?php

class Weather
{

	public function __construct(){
		
	}

	public function getWeather($location){
		$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
		$yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$location.'") and u="c"';
		$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query)."&format=json&env=storedatatables.org";
		// Make call with cURL
		$session = curl_init($yql_query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);
		// Convert JSON to PHP object
		//$data = json_decode($json)->query->results->channel;
		//var_dump($data);
		return json_decode($json,true)["query"]["results"]["channel"];
	}
	
}
?>