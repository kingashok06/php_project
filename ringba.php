<?php

if (isset($_GET["submit"])){
  	$submit=$_GET["submit"];
}elseif (isset($_POST["submit"])){
  	$submit=$_POST["submit"];
}

$response = array();

if($submit){
  $data = $_GET;

  foreach( $data as $key => $key_value ){
    $query_array[] = urlencode( $key ) . '=' . urlencode( $key_value );
  }

  $query_string = implode('&', $query_array);

  $curl_connection = curl_init('https://display.ringba.com/enrich/2059702967019242516?'.$query_string);
  curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
  curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);

  $response['site1'] = json_decode(curl_exec($curl_connection), true);
  $response['site2'] = array('msg' => 'Error', 'errors' => array('error' => 'Unable to post.'));
  curl_close($curl_connection);

  if($response['site1'] && isset($response['ringba']['status']) == "ok"){
    $data2['lp_campaign_id']  = "63a2437348ed7";
    $data2['lp_campaign_key'] = "xVzDrv2gTKcwCtMymdhZ";
    $data2['phone_home']     	= $_GET['callerid'];
    $data2['loan_amount']    	= $_GET['Loan_Amount'];
    $data2['jornaya_leadid']  = $_GET['jornaya_lead'];
    $data2['lp_response']    	= "json";

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://nexleveldirect.leadspediatrack.com/post.do',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $data2,
    ));

    $response['site2'] = json_decode(curl_exec($curl), true);

    if(isset($response['site2']['price'])){
    	unset($response['site2']['price']);
    }
    if(isset($response['site2']['redirect_url'])){
    	unset($response['site2']['redirect_url']);
    }

    curl_close($curl);
    
  }

  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($response);

}