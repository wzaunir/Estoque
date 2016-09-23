<?php

/**
 * Classe para gerenciar os produtos 
 * @author Welington
 */
class Estoque 
{
    private $produtos = array();
    private $pdo;
    
    public function __construct(PDO $db) {
        $this->pdo = $db;
    }

    
    /**
     * Adiciona um produto a tabela
     * @param int $produto
     * @param int $quantidade
     */
    public function addProduto(Produto $produto,$quantidade){
        
        $this->produtos[$produto->getCodigo()]['quantidade'] = $quantidade;
        $this->produtos[$produto->getCodigo()]['produto'] = $produto;
        
    }
    
    /**
     * Remove a quantidade de determinado produto
     * @param int $produto
     * @param int $quantidade
     */
    public function remProduto(Produto $produto,$quantidade){
        
       
    }
    /**
     * Método para mostrar todos os produtos cadastrados
     * @return array Produtos
     */
    public function listarTudo(){
        $sql = 'SELECT * FROM produto';
        $retorno = $this->pdo->query($sql);
        return $retorno->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    /**
     * Retorna o objeto pelo codigo informado
     * @param int $codigo
     * @return Produto
     */
    public function listaProduto($codigo){
        
    }
    
    /**
     * Sincroniza o objeto com o banco de dados
     */
    public function sinc(){
        
    }
    
}
