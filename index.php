<?php

require_once 'Tabela/Produto.php';
require_once 'Estoque.php';

use Hering\Tabela\Produto;
use Hering\Estoque;

//$pdo = new PDO('mysql:host=localhost;port=3306;dbname=Estoque','root','elaborata');
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


$estoque = new Estoque($pdo);
$estoque->addProduto($produto, 5);
$estoque->addProduto($produto2, 10);
$estoque->addProduto($produto, 4);

/*removendo produto*/
try{
    $estoque->remProduto($produto, 90);
    
} catch (\Exception $e) {
  echo $e->getMessage();
}

$estoque->listarTudo();

var_dump($estoque);
/*listar um unico produto*/

$prod = $estoque->listaProduto(999993);

var_dump($prod);
