<?php
    $lcity = $_POST['lcity'];
    $dcity = $_POST['dcity'];
    $ddate = $_POST['ddate'];
    $rdate = $_POST['rdate'];
    $ag = $_POST['ag'];
    $cg = $_POST['cg'];
    $ig = $_POST['ig'];
    $cabin = $_POST['cabin'];
    $errors = array();
    if (empty($lcity)) {
        array_push($errors, "Departure City is Recquired");
        echo  "<p style='color:red;margin:15px;text-align:center'> Departure City is Recquired </p>";
    }
    if (empty($dcity)) {
        array_push($errors, "Desitnation City is Recquired");
        echo  "<p style='color:red;margin:15px;text-align:center'> Destination City is Recquired </p>";
    }
    if (empty($ddate)) {
        array_push($errors, "Departure Date is Recquired");
        echo  " <p style='color:red;margin:15px;text-align:center'>Departure Date is Recquired </p>";
    }
    
    if (count($errors) == 0) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://www.ije-api.tcore.xyz/v1/flight/search-flight",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => false,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"header\": {\n        \"cookie\": \"YPYgcq0bHBcM8BgdSP73\"\n    },\n    \"body\": {\n        \"origin_destinations\": [\n            {\n                \"departure_city\": \"$lcity\",\n                \"destination_city\": \"$dcity\",\n                \"departure_date\": \"$ddate\",\n                \"return_date\": \"$rdate\"\n            }\n        ],\n        \"search_param\": {\n            \"no_of_adult\": \"$ag\",\n             \"no_of_child\": \"$cg\",\n             \"no_of_infant\": \"$ig\",\n          \"preferred_airline_code\" : \"\",\n            \"calendar\" : true,\n            \"cabin\": \"$cabin\"\n        }\n    }\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$response_array = json_decode($response, true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    foreach($response_array['body']['data']['itineraries'] as $reslt){
        foreach($reslt['origin_destinations'] as $resltt){
            foreach($resltt['segments'] as $reslttt){
                echo "<tr> <td> ". $reslttt['departure']['date'] . ", ". $reslttt['departure']['time'] . "</td> <td>". $reslttt['departure']['airport']['code']. "/ ". $reslttt['departure']['airport']['name']. "</td> <td> ". $reslttt['arrival']['date'] . ", ". $reslttt['arrival']['time'] . "</td> <td>". $reslttt['arrival']['airport']['code']. "/ ". $reslttt['arrival']['airport']['name']. "</td>  <td>". $reslttt['operating_airline']['name']. "/ ". $reslttt['flight_number']. "</td>  <td>". $reslt['pricing']['provider']['currency']['code']. " - ". $reslt['pricing']['provider']['base_fare']. "</td> </tr>";
            }
        }
    }
}
    }
?>
