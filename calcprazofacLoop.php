<?php

/**

	LOOP para tentar identificar algum código de serviõ valido para o método CalcPrecoFAC
	
*/

$domainname = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx';
//	/calculador/CalcPrecoPrazo.asmx/CalcPrecoFAC?nCdServico=string&nVlPeso=string&strDataCalculo=string HTTP/1.1

/* 40010 = SEDEX Varejo
  40045 = SEDEX a Cobrar Varejo
  40215 = SEDEX 10 Varejo
  40290 = SEDEX Hoje Varejo
  41106 = PAC Varejo */

$functionname = 'CalcPrecoFAC';



$parametros = new stdClass();
$parametros->nVlPeso = '10';
$parametros->strDataCalculo = date("Y-m-d");

for ($i = 40010; $i < 41106; $i++) {
    $serverurl = $domainname . '/' . $functionname . '?' . 'nCdServico=' . $i . '&nVlPeso=' . $parametros->nVlPeso . '&strDataCalculo=' . $parametros->strDataCalculo . '';

    try {

        $resp = file_get_contents($serverurl);

    } catch (Exception $e) {
        echo $e;
    }

	$xml = new SimpleXMLElement($resp);

	if($xml->Servicos->cServico->Erro > 0){
		print_r($xml->Servicos->cServico);
	}else{

		echo $xml->Servicos->cServico->Erro;
	}
    
}



?>