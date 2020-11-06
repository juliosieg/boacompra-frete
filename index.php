<?php 

require __DIR__.'/vendor/autoload.php';

use App\Empresa;
use App\Produto;
use App\Transporte;

/*Declaração das empresas que serão utilizadas para cálculo de fretes*/
$empresa1 = new Empresa();
$empresa1->setNome('BoaDex');
$empresa1->setValorFixo(10.00);
$empresa1->setValorKmKg(0.05);

$empresa2 = new Empresa();
$empresa2->setNome('BoaLog');
$empresa2->setValorFixo(4.30);
$empresa2->setValorKmKg(0.12);

$empresa3 = new Empresa();
$empresa3->setNome('Transboa');
$empresa3->setValorFixo(2.10);
$empresa3->setValorKmKg(1.10);
$empresa3->setKgMaximo(5);
$empresa3->setValorFixoExcedente(10);
$empresa3->setValorKmKgExcedente(0.01);

/*Declaração da classe transporte contendo as empresas à serem utilizadas para cálculo*/
$transporte = new Transporte();
$transporte->adicionarEmpresa($empresa1);
$transporte->adicionarEmpresa($empresa2);
$transporte->adicionarEmpresa($empresa3);

/*Brindes à serem verificados*/
$brindes = [
    ['produto' => 'Fone de ouvido gamer', 'distancia' => 1, 'peso' => 1],
    ['produto' => 'Controle Xbox', 'distancia' => 1, 'peso' => 3],
    ['produto' => 'PC Gamer', 'distancia' => 1, 'peso' => 35],
    ['produto' => 'Fone de ouvido', 'distancia' => 430, 'peso' => 1],
    ['produto' => 'Fone de ouvido', 'distancia' => 33, 'peso' => 1],
    ['produto' => 'Fone de ouvido', 'distancia' => 50, 'peso' => 1],
    ['produto' => 'Controle Xbox', 'distancia' => 100, 'peso' => 3],
    ['produto' => 'Kit Gamer', 'distancia' => 1000, 'peso' => 5],
    ['produto' => 'Teclado + Fone', 'distancia' => 5, 'peso' => 6],
    ['produto' => 'PC Gamer', 'distancia' => 1000, 'peso' => 35],
];

/*Loop para cálculo de melhor frete para cada brinde*/
foreach ($brindes as $brinde) {

    /*Declaração de brinde dentro da classe de Produto*/
    $produto = new Produto();
    $produto->setDescricao($brinde['produto']);
    $produto->setPeso($brinde['peso']);
    
    /*Atribuição dos dados de transporte*/ 
    $transporte->setDistancia($brinde['distancia']);
    $transporte->setProduto($produto);
 
    /*Formatação e exibição de dados*/
    echo '<br />';
    echo '<br />';
    echo '------------------------------------<br />';

    echo '<b>Produto: </b>'.$produto->getDescricao().'<br />';
    echo '<b>Distância: </b>'.$transporte->getDistancia().' km<br />';
    echo '<b>Peso: </b>'.$produto->getPeso().' kg <br/>';

    foreach ($transporte->calculaFretes() as $frete) {
        echo '<br>';
        echo '<b>'.$frete['empresa'].'</b> - R$ '.$frete['valor'];   
    }

}