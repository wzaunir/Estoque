<?php
namespace Hering;
use Hering\Estoque;
use Hering\Tabela\Produto;
/**
 * Classe para carregar compra e pagamento
 * @author aluno
 */
class Caixa 
{    
    private $listaProdutos = array();
    private $estoque;   
    
    /**
    * 
    * @param \Hering\Estoque $estoque 
    */
    public function __construct(Estoque $estoque) {
        
        $this->estoque  = $estoque;
    }

    /**
    * Adiciona um produto ao caixa
    * @param Produto $produto
    * @param int $quant
    * 
    */
    public function addProduto(Produto $produto,$quant){
        if (array_key_exists($produto->getCodigo(), $this->listaProdutos)){
            $quantidade += $this->listaProdutos[$produto->getCodigo()]['quantidade'];

        }
        $this->listaProdutos[$produto->getCodigo()]['quantidade'] = $quant;
        $this->listaProdutos[$produto->getCodigo()]['produto'] = $produto;
    }
    
    /**
    * Totaliza o valor a pagar
    */
    public function totalPagar(){
        $total = 0;
        foreach ($this->listaProdutos as $produto){
            $valor = $produto['quantidade'] * $produto['produto']->getValor();
            $total += $valor;
        }
        return $total;
    }
    
    /**
    * Realiza o pagamento e baixa o estoque
    */
    public function pagar(){
        
        foreach ($this->listaProdutos as $produto){
        
            $this->estoque->remProduto($produto['produto'], $produto['quantidade']);
            
        }
        
    }
}
