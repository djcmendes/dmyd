<?php
ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 
class server{
    public function __construct(){

    }

    public function getPhysicians($id_array=null){
        $data = array();
        if(empty($id_array)){
            $data = array(
                    array('code'=>'DR01','name'=>'Doc. John Doe'),
                    array('code'=>'DR02','name'=>'Doc. Janice Doe')
            );
        }else{
            $data = array(
                    array('code'=>'DR01','name'=>'Doc. John Doe')
            );
        }
        
        return $this->genXML($data,'Physicians','Physician',null);
    }

    public function getSpecialty($id_array=null){
        $data = array();
        if(empty($id_array)){
            $data = array(
                array('code'=>'00101','name'=>'Cardiology'),
                array('code'=>'00201','name'=>'Ophthalmology') 
            );
        }else{
            $data = array(
                array('code'=>'00101','name'=>'Cardiology')
            );
        }
        return $this->genXML($data,'Specialities','Speciality',null);
    }
    public function getSpecialtySort($sort_by=null){
        $sort_by = empty($sort_by) ? array('SORT_BY'=>'code') : $sort_by;
        $data = array( 
            array('code'=>'00101','name'=>'Cardiology'),
            array('code'=>'00201','name'=>'Ophthalmology'),
            array('code'=>'00301','name'=>'Anesthesiology'),
            array('code'=>'00401','name'=>'Dermatology')
        );

        function byKeysort($k) {
            return function ($a, $b) use ($k) {
                return strnatcmp($a[$k], $b[$k]);
            };
        }
        
        usort($data, byKeysort($sort_by['SORT_BY']));
        return $this->genXML($data,'Specialities','Speciality',null);
    }

    private function genXML($data,$root_el=null,$el=null,$xml=null) {        
        if ($xml === null) {
            $root_el = !empty($root_el) ? '<'.$root_el.'/>' : '<root/>';
            $xml = new SimpleXMLElement($root_el);
        }
            
        // Visit all key value pair
        foreach ($data as $k => $v) {
            if (is_array($v)) { 
                if(is_numeric($k)){
                    $this->genXML($v, $el,$el, $xml->addChild($el));
                }else{
                    $this->genXML($v, $k,$k, $xml->addChild($k));
                }
            } else {
                if(is_numeric($k)){
                    $xml->addChild($el, $v);
                }else{
                    $xml->addChild($k, $v);
                }
                
            }
        }
        
        return $xml->asXML();
    }
}

$params = array('uri'=> 'http://172.18.0.3/dmyd/src/server.php');

$server = new SoapServer(NULL,$params);
$server->setClass('server');
$server->handle();