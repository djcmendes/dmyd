<?php
ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 
class client{
    private $instance = null;
    public function __construct(){
        $params = array('location'=> 'http://172.18.0.3/dmyd/src/server.php',
                        'uri'=> 'urn://172.18.0.3/dmyd/src/server.php',
                        //'exceptions'=>0,
                        'trace'=> 1
        );

        $this->instance = new SoapClient(null,$params);   
    }
    public function getName($id_array){
        $result = $this->instance->__soapCall('getStudentName',$id_array);
        return $result; 
    }
    public function getPhysicians($id_array=null){
        try{
            $result = $this->instance->__soapCall('getPhysicians',$id_array);
        }
        catch(\Throwable $e) {
            echo $this->instance->__getLastRequest();
            echo $this->instance->__getLastResponse();
            $result = $this->instance->__getLastResponse();
        }

        return $xml = new SimpleXMLElement($result); ; 
    }

    
}

$client = new client;


?>