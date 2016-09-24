<?php
namespace Hering;
/**
 * Classe para carregar compra e pagamento
 *
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
        
    }
    
    /**
     * Totaliza o valor a pagar
     */
    public function totalPagar(){
        
    }
    
    /**
     * 
     * Realiza o pagamento e baixa o estoque
     */
    public function pagar(){
        
        
    }
}
