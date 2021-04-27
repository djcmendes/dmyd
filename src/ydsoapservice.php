<?php
/*
Apresenta os resultados de todos os scripts
*/
require __DIR__.'/../vendor/autoload.php';





$classs = get_declared_classes ();

foreach ($classs as $class){
    echo '<br>'.$class;
}

use \YDSoapService;

$soap_service = new \YDSoapService();

echo $app->run();

