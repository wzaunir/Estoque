<?php

require_once 'Produto.php';
require_once 'Estoque.php';

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


$estoque = new Estoque($pdo);
$estoque->addProduto($produto, 5);
$estoque->addProduto($produto2, 10);
$estoque->listarTudo();

var_dump($estoque);