<?php

require_once 'Tabela/Produto.php';
require_once 'Estoque.php';
require_once 'Caixa.php';
require_once 'Tabela/ProdutoTabela.php';
use Hering\Tabela\Produto;
use Hering\Estoque;
use Hering\Tabela\ProdutoTabela;

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=Estoque','root','elaborata');

$produto = new Produto();
$produto->setCodigo(999991)
        ->setNome('Camiseta Polo')
        ->setTamanho('G')
        ->setValor(75.80)
        ->getModelo('Basico');

$produto2 = new Produto();
$produto2->setCodigo(999992)
        ->setNome('Calcinha')
        ->setTamanho('G')
        ->setValor(5.80)
        ->getModelo('Basica');


$estoque = Estoque::getInstance($pdo);
$estoque->addProduto($produto, 5);
$estoque->addProduto($produto2, 10);
$estoque->addProduto($produto, 4);

/*removendo produto*/
try{
    $estoque->remProduto($produto, 1);
    
} catch (\Exception $e) {
  echo $e->getMessage();
}

$estoque->listarTudo();

var_dump($estoque);

$estoque->sync();


/*listar um unico produto*/
$prod = $estoque->listaProduto(999993);

$caixa = new Hering\Caixa($estoque);

$caixa->addProduto($produto2, 3);
$caixa->addProduto($produto, 5);
//var_dump($caixa->totalPagar());


//var_dump($tabela->findAll());
