<?php
namespace Hering;

use Hering\Tabela\Produto;
/**
 * Classe para gerenciar os produtos 
 * @author Welington
 */
class Estoque 
{
    private $produtos = array();

    
    public function __construct() 
    {
        $this->sync();
    }
    /**
     * Adiciona um produto a tabela
     * @param int $produto
     * @param int $quantidade
     */
    public function addProduto(Produto $produto,$quantidade){
        
        if (array_key_exists($produto->getCodigo(), $this->produtos)){
            $quantidade += $this->produtos[$produto->getCodigo()]['quantidade'];

        }
        $this->produtos[$produto->getCodigo()]['quantidade'] = $quantidade;
        $this->produtos[$produto->getCodigo()]['produto'] = $produto;
        
    }
    
    /**
     * Remove a quantidade de determinado produto
     * @param int $produto
     * @param int $quantidade
     */
    public function remProduto(Produto $produto,$quantidade){
        $qtd = $this->produtos[$produto->getCodigo()]['quantidade'];
        if( $qtd <= $quantidade){
            throw new \Exception("Nao foi possivel remover os produtos: "
                    . "Quantidade em estoque: ".$qtd );
        }else{
            $this->produtos[$produto->getCodigo()]['quantidade'] -= $quantidade;
        }
    }
    /**
     * Método para mostrar todos os produtos cadastrados
     * @return array Produtos
     */
    public function listarTudo(){
       
        return $this->produtos;
        
    }
    
    /**
     * Retorna o objeto pelo codigo informado
     * @param int $codigo
     * @return Produto || Nulo se nao existir
     */
    public function listaProduto($codigo){
        if(array_key_exists($codigo, $this->produtos) == false){
            return null;
        }
        return $this->produtos[$codigo]['produto'];
    }
    
    /**
     * Sincroniza o objeto com o banco de dados
     */
    public function sync(){
        
    }
    
}
