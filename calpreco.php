

<?php
 

$domainname = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx';
//	/calculador/CalcPrecoPrazo.asmx/CalcPreco?nCdEmpresa=string&sDsSenha=string&nCdServico=string&sCepOrigem=string&sCepDestino=string&nVlPeso=string&nCdFormato=string&nVlComprimento=string&nVlAltura=string&nVlLargura=string&nVlDiametro=string&sCdMaoPropria=string&nVlValorDeclarado=string&sCdAvisoRecebimento=string HTTP/1.1

/* 40010 = SEDEX Varejo
  40045 = SEDEX a Cobrar Varejo
  40215 = SEDEX 10 Varejo
  40290 = SEDEX Hoje Varejo
  41106 = PAC Varejo */

$functionname = 'CalcPreco';



$parametros = new stdClass();
$parametros->nCdEmpresa = ''; //NÃO É OBRIGATÓRIO,  mas o parâmetro tem que ser passado mesmo vazio.
$parametros->sDsSenha = ''; //Senha para acesso ao serviço, associada ao seu código administrativo. NÃO É OBRIGATÓRIO,  mas o parâmetro tem que ser passado mesmo vazio.
$parametros->nCdServico = '40010';
$parametros->sCepOrigem = '30170-010';
$parametros->sCepDestino = '77015-616';
$parametros->nVlPeso = '12';

/*Formato da encomenda (incluindo embalagem).
Valores possíveis: 1, 2 ou 3
1 – Formato caixa/pacote
2 – Formato rolo/prisma
3 - Envelope*/
$parametros->nCdFormato = '1';
$parametros->nVlComprimento = '16'; //Comprimento da encomenda (incluindo embalagem),em centímetros.
$parametros->nVlAltura = '3'; //Altura da encomenda (incluindo embalagem), em centímetros. Se o formato for envelope, informar zero (0).
$parametros->nVlLargura = '11'; //Largura da encomenda (incluindo embalagem), em centímetros.
$parametros->nVlDiametro = '1'; //Diâmetro da encomenda (incluindo embalagem), em centímetros.
/*Indica se a encomenda será entregue com o serviço
adicional mão própria.
Valores possíveis: S ou N (S – Sim, N – Não)*/
$parametros->sCdMaoPropria = '1';
/*Indica se a encomenda será entregue com o serviço
adicional valor declarado. Neste campo deve ser
apresentado o valor declarado desejado, em Reais.*/
$parametros->nVlValorDeclarado = '17,00';
/*Indica se a encomenda será entregue com o serviço
adicional aviso de recebimento.
Valores possíveis: S ou N (S – Sim, N – Não)*/
$parametros->sCdAvisoRecebimento = 'S';

$serverurl = $domainname . '/' . $functionname . '?' . 'nCdEmpresa='.$parametros->nCdEmpresa.'&sDsSenha='.$parametros->sDsSenha.'&nCdServico='.$parametros->nCdServico.'&sCepOrigem='.$parametros->sCepOrigem.'&sCepDestino='.$parametros->sCepDestino.'&nVlPeso='.$parametros->nVlPeso.'&nCdFormato='.$parametros->nCdFormato.'&nVlComprimento='.$parametros->nVlComprimento.'&nVlAltura='.$parametros->nVlAltura.'&nVlLargura='.$parametros->nVlLargura.'&nVlDiametro='.$parametros->nVlDiametro.'&sCdMaoPropria='.$parametros->sCdMaoPropria.'&nVlValorDeclarado='.$parametros->nVlValorDeclarado.'&sCdAvisoRecebimento='.$parametros->sCdAvisoRecebimento.'';
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