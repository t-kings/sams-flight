<?php
    $p = $_POST['p'];
    $cities = "http://www.ije-api.tcore.xyz/v1/plugins/airports-type-ahead/" . $p;
    $citylist= file_get_contents($cities);
    $cities_array = json_decode($citylist, true);
    foreach($cities_array['body']['data'] as $name){
        echo "<option value='". $name['code'] . " / ". $name['name']. "'>";
    }
?>