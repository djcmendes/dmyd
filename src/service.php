<?php
ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 
include './client.php';
$id_array = array('id'=> 'DR01');
$result = $client->getPhysicians($id_array);
print_r($result);
?>