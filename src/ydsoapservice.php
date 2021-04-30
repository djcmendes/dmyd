<?php
/*
Apresenta os resultados de todos os scripts
*/
require __DIR__.'/../vendor/autoload.php';

$classs = get_declared_classes();

foreach ($classs as $class){
    //echo '<br>'.$class;
}

use djcmendes\ydsoapservice\YDSoapService;

//$wsdl = 'http://soap.ydigitalmedia.com/solution.asmx?wsdl';
$url = null;
$params = array('location'=> 'http://172.18.0.3/dmyd/src/server.php',
                'uri'=> 'urn://172.18.0.3/dmyd/src/server.php',
                //'exceptions'=>0,
                'trace'=> 1
);
$soap_service = new YDSoapService($url,$params);


// pergunta 1

//all Physicians 1.1
echo '<br>'.'- 1.1 - '.'<br>';
$result_11 = $soap_service->request(array(),'getPhysicians');
echo '<pre>'.htmlentities($result_11->asXML()).'</pre>';

//all Physicians of speciality 1.2
$param_get_physicians_of_speciality = array('ID_SPECIALITY' => '00101');
$result_12 = $soap_service->request($param_get_physicians_of_speciality,'getPhysicians');
echo '<br>'.'- 1.2 -'.'<br>';
echo '<pre>'.htmlentities($result_12->asXML()).'</pre>';

$code = 'DR01';
$physician_13 = null;
foreach($result_11->Physician as $k => $physician){
    if($physician->code == $code){
        $physician_res_13 = $physician;
        break;
    }
}
$param_get_specialty  = array('ID_PHYSICIAN'  => $code); 
$specialty = $soap_service->request($param_get_specialty,'getSpecialty');

echo '<br>'.'- 1.3 -'.'<br>';
echo '<pre>'.htmlentities($physician_res_13->asXML()).'</pre>';
echo '<pre>'.htmlentities($specialty->asXML()).'</pre>';


echo '<br>'.'- 1.4 -'.'<br>';
$result_14 = $soap_service->request(array(),'getSpecialty');
echo '<pre>'.htmlentities($result_14->asXML()).'</pre>';

echo '<br>'.'- 1.5 -'.'<br>';
$param_get_specialty_of_physician  = array('ID_PHYSITIAN'  => $code); 
$result_15 = $soap_service->request($param_get_specialty_of_physician,'getSpecialty');
echo '<pre>'.htmlentities($result_15->asXML()).'</pre>';

echo '<br>'.'- 1.6 -'.'<br>';
$param_get_physicians_of_speciality = array('ID_SPECIALITY' => '00101');
$result_16 = $soap_service->request($param_get_physicians_of_speciality,'getPhysicians');
echo '<pre>'.htmlentities($result_16->asXML()).'</pre>';


//exemplo de ordenação, escolher o campo "$sort_by" e a lista "$result_16"
echo '<br>'.'- 1.7 -'.'<br>';
$sort_by = 'name';
$result_17 = $soap_service->request(array('SORT_BY'=>$sort_by),'getSpecialtySort');
echo 'Sorter is configured by "name" (change $sort_by):<pre>'.htmlentities($result_17->asXML()).'</pre>';
