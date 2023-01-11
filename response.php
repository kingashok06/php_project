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
   echo $query_string;

  $curl_connection = curl_init('https://display.ringba.com/enrich/2059702967019242516?'.$query_string);
  curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
  curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);

  $response['site1'] = json_decode(curl_exec($curl_connection), true);
  $response['site2'] = array('msg' => 'Error', 'errors' => array(array('error' => 'Unable to post.')));
  curl_close($curl_connection);


  if($response['site1'] && isset($response['site1']['status']) == "ok"){
    $data2['lp_campaign_id']  = "63a2437348ed7";
    $data2['lp_campaign_key'] = "xVzDrv2gTKcwCtMymdhZ";
    $data2['phone_home']      = $_GET['callerid'];
    $data2['loan_amount']     = $_GET['Loan_Amount'];
    $data2['jornaya_leadid']  = $_GET['jornaya_lead'];
    $data2['lp_response']     = "json";
    
    if(isset($_GET['lp_s1'])){$data2['lp_s1'] = $_GET['lp_s1'];}
    if(isset($_GET['lp_s2'])){$data2['lp_s2'] = $_GET['lp_s2'];}
    if(isset($_GET['lp_s3'])){$data2['lp_s3'] = $_GET['lp_s3'];}
    if(isset($_GET['lp_s4'])){$data2['lp_s4'] = $_GET['lp_s4'];}
    if(isset($_GET['lp_s5'])){$data2['lp_s5'] = $_GET['lp_s5'];}
    if(isset($_GET['lp_test'])){$data2['lp_test'] = $_GET['lp_test'];}
    if(isset($_GET['First_Name'])){$data2['first_name'] = $_GET['First_Name'];}
    if(isset($_GET['Last_Name'])){$data2['last_name'] = $_GET['Last_Name'];}
    if(isset($_GET['phone_cell'])){$data2['phone_cell'] = $_GET['phone_cell'];}
    if(isset($_GET['phone_work'])){$data2['phone_work'] = $_GET['phone_work'];}
    if(isset($_GET['phone_ext'])){$data2['phone_ext'] = $_GET['phone_ext'];}
    if(isset($_GET['Address'])){$data2['address'] = $_GET['Address'];}
    if(isset($_GET['address2'])){$data2['address2'] = $_GET['address2'];}
    if(isset($_GET['City'])){$data2['city'] = $_GET['City'];}
    if(isset($_GET['State'])){$data2['state'] = $_GET['State'];}
    if(isset($_GET['Zip'])){$data2['zip_code'] = $_GET['Zip'];}
    if(isset($_GET['county'])){$data2['county'] = $_GET['county'];}
    if(isset($_GET['country'])){$data2['country'] = $_GET['country'];}
    if(isset($_GET['Email_Address'])){$data2['email_address'] = $_GET['Email_Address'];}
    if(isset($_GET['dob'])){$data2['dob'] = $_GET['dob'];}
    if(isset($_GET['ip_address'])){$data2['ip_address'] = $_GET['ip_address'];}
    if(isset($_GET['Property_Value'])){$data2['home_value'] = $_GET['Property_Value'];}
    if(isset($_GET['lp_caller_id'])){$data2['lp_caller_id'] = $_GET['lp_caller_id'];}
    if(isset($_GET['property_state'])){$data2['property_state'] = $_GET['property_state'];}
    if(isset($_GET['loan_purpose'])){$data2['loan_purpose'] = $_GET['loan_purpose'];}
    if(isset($_GET['mortgage_balance'])){$data2['mortgage_balance'] = $_GET['mortgage_balance'];}
    if(isset($_GET['notes'])){$data2['notes'] = $_GET['notes'];}
    if(isset($_GET['Rate'])){$data2['interest_rate'] = $_GET['Rate'];}
    if(isset($_GET['Loan_Type'])){$data2['loan_type'] = $_GET['Loan_Type'];}
    if(isset($_GET['military_status'])){$data2['military_status'] = $_GET['military_status'];}
    if(isset($_GET['property_type'])){$data2['property_type'] = $_GET['property_type'];}
    if(isset($_GET['Credit_Rating'])){$data2['credit'] = $_GET['Credit_Rating'];}
    if(isset($_GET['occupational_status'])){$data2['occupational_status'] = $_GET['occupational_status'];}
    if(isset($_GET['property_use'])){$data2['property_use'] = $_GET['property_use'];}
    if(isset($_GET['credit_dropdown'])){$data2['credit_dropdown'] = $_GET['credit_dropdown'];}
    if(isset($_GET['occupation_dropdown'])){$data2['occupation_dropdown'] = $_GET['occupation_dropdown'];}
    if(isset($_GET['loan_purpose_dropdown'])){$data2['loan_purpose_dropdown'] = $_GET['loan_purpose_dropdown'];}
    if(isset($_GET['property_type_dropdown'])){$data2['property_type_dropdown'] = $_GET['property_type_dropdown'];}
    if(isset($_GET['property_use_dropdown'])){$data2['property_use_dropdown'] = $_GET['property_use_dropdown'];}
    if(isset($_GET['day_phone'])){$data2['day_phone'] = $_GET['day_phone'];}
    if(isset($_GET['agent_id'])){$data2['agent_id'] = $_GET['agent_id'];}
    if(isset($_GET['debt_amount'])){$data2['debt_amount'] = $_GET['debt_amount'];}
    if(isset($_GET['mortgage_type'])){$data2['mortgage_type'] = $_GET['mortgage_type'];}
    if(isset($_GET['gender'])){$data2['gender'] = $_GET['gender'];}
    if(isset($_GET['tcpa_text'])){$data2['tcpa_text'] = $_GET['tcpa_text'];}
    if(isset($_GET['browser'])){$data2['browser'] = $_GET['browser'];}
    if(isset($_GET['ab_coverage'])){$data2['ab_coverage'] = $_GET['ab_coverage'];}
    if(isset($_GET['received_timestamp'])){$data2['received_timestamp'] = $_GET['received_timestamp'];}
    if(isset($_GET['json_object'])){$data2['json_object'] = $_GET['json_object'];}
    if(isset($_GET['edu_debt'])){$data2['edu_debt'] = $_GET['edu_debt'];}
    if(isset($_GET['bankruptcy'])){$data2['bankruptcy'] = $_GET['bankruptcy'];}
    if(isset($_GET['loan_type_dropdown'])){$data2['loan_type_dropdown'] = $_GET['loan_type_dropdown'];}
    if(isset($_GET['cash_out'])){$data2['cash_out'] = $_GET['cash_out'];}


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
  echo json_encode($response, JSON_PRETTY_PRINT);

}
