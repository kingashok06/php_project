<?php

if (isset($_GET["submit"])){
  $submit=$_GET["submit"];
}elseif (isset($_POST["submit"])){
  $submit=$_POST["submit"];
}

if($submit){
	$data = $_GET;

	foreach( $data as $key => $key_value ){
	  	$query_array[] = urlencode( $key ) . '=' . urlencode( $key_value );
	}

	$query_string = implode('&', $query_array);

	$curl_connection = curl_init('https://display.ringba.com/enrich/2059702967019242516?'.$query_string);
	curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);

	$response = json_decode(curl_exec($curl_connection), true);
	curl_close($curl_connection);

	// print_r($response);

	if($response && isset($response['status']) == "ok"){
		// print_r($response);

		// $curl_connection_2 = curl_init('https://nexleveldirect.leadspediatrack.com/posting-instructions.html?c=621&type=Server&'.$query_string);
		// curl_setopt($curl_connection_2, CURLOPT_CONNECTTIMEOUT, 30);
		// curl_setopt($curl_connection_2, CURLOPT_RETURNTRANSFER, true);

		// $response_2 = json_decode(curl_exec($curl_connection_2), true);

		// print_r($response_2);

		
		$_GET['lp_campaign_id'] = $_GET['jornaya_lead'];
		$_GET['lp_campaign_key'] = $_GET['jornaya_lead'];
		$_GET['phone_home'] = $_GET['callerid'];
		$_GET['loan_amount'] = $_GET['Loan_Amount'];
		$_GET['jornaya_leadid'] = $_GET['jornaya_lead'];

		$data2 = $_GET;


		foreach( $data as $key => $key_value ){
		  $query_array[] = urlencode( $key ) . '=' . urlencode( $key_value );
		}

		$query_string = implode('&', $query_array);


		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://nexleveldirect.leadspediatrack.com/posting-instructions.html?c=621&type=Server',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => $data2,
		  CURLOPT_HTTPHEADER => array(
		    'Cookie: PHPSESSID=hn1t56olno248intmf7ftfptf2'
		  ),
		));

		$response2 = curl_exec($curl);

		curl_close($curl);
		echo $response2;
	}

}