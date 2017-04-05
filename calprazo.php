

<?php

/* $parametros = array('1', '1', date("Y-m-d"));

   

   $parametros = http_build_query($parametros);
   $url = 'http://http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?op=CalcPrecoFAC';
   $curl = curl_init($url.'?'.$parametros);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $dados = curl_exec($curl);
   $dados = simplexml_load_string($dados);

   foreach($dados->cServico as $linhas) {
    if($linhas->Erro == 0) {
    
  print_r($linhas);
    }else {
     echo $linhas->MsgErro;
    }
    echo '<hr>';
   }
 */

$domainname = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx';
//	/calculador/CalcPrecoPrazo.asmx/CalcPrecoFAC?nCdServico=string&nVlPeso=string&strDataCalculo=string HTTP/1.1

/* 40010 = SEDEX Varejo
  40045 = SEDEX a Cobrar Varejo
  40215 = SEDEX 10 Varejo
  40290 = SEDEX Hoje Varejo
  41106 = PAC Varejo */

$functionname = 'CalcPrazo';



$parametros = new stdClass();
$parametros->nCdServico = '40010';
$parametros->sCepOrigem = '30170-010';
$parametros->sCepDestino = '77015-616';

$serverurl = $domainname . '/' . $functionname . '?' . 'nCdServico=' . $parametros->nCdServico . '&sCepOrigem=' . $parametros->sCepOrigem . '&sCepDestino=' . $parametros->sCepDestino . '';


//print_r($serverurl );


try {
    $resp = file_get_contents($serverurl);
} catch (Exception $e) {
    echo "erro";
    echo $e;
}

$xml = new SimpleXMLElement($resp);

echo "<pre>";
var_dump($xml);
echo "</pre>";
?>