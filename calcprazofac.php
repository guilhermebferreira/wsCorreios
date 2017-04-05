<?php

$domainname = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx';
//	/calculador/CalcPrecoPrazo.asmx/CalcPrecoFAC?nCdServico=string&nVlPeso=string&strDataCalculo=string HTTP/1.1

/* 40010 = SEDEX Varejo
  40045 = SEDEX a Cobrar Varejo
  40215 = SEDEX 10 Varejo
  40290 = SEDEX Hoje Varejo
  41106 = PAC Varejo */

$functionname = 'CalcPrecoFAC';



$parametros = new stdClass();
$parametros->nCdServico = '40215';
$parametros->nVlPeso = '10';
$parametros->strDataCalculo = date("Y-m-d");


$serverurl = $domainname . '/' . $functionname . '?' . 'nCdServico=' . $parametros->nCdServico . '&nVlPeso=' . $parametros->nVlPeso . '&strDataCalculo=' . $parametros->strDataCalculo . '';


print_r($serverurl);


try {
    $resp = file_get_contents($serverurl);
} catch (Exception $e) {
    echo $e;
}

$xml = new SimpleXMLElement($resp);

echo "<pre>";
var_dump($xml);
echo "</pre>";
?>