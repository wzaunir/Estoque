<?php
namespace Hering;

use Hering\Tabela\Produto;
use Hering\Tabela\ProdutoTabela;
/**
 * Classe para gerenciar os produtos 
 * @author Welington
 */
class Estoque 
{
    private $produtos = array();
    private $_produtosOriginal = array();
    private $tabela;
    static private $instancia;
    
    private function __construct(\PDO $pdo) 
    {
        
        $this->tabela = new ProdutoTabela($pdo);
        $this->sync();
    }
    
    /**
     * Método para criar apenas um unico objeto
     * Evitar duplicidade
     * @param PDO
     * @return criando o construct
     */
    static public function getInstance(\PDO $pdo){
        if(self::$instancia == null){
            self::$instancia = new self($pdo);
        }
        
        return self::$instancia;
    }
    
    /**
     * Adiciona um produto a tabela
     * @param int $produto
     * @param int $quantidade
     * @return void
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
     * @return void
     */
    public function sync(){
        if(count($this->produtos) == 0){
            
            $lista = $this->tabela->findAll();
            
            foreach ($lista as $produto){
                $this->_produtosOriginal[$produto->getCodigo()]['produto'] = $produto;
                $this->addProduto($produto, 0);
            }
        }else{
            foreach ($this->produtos as $codigo=>$produto){
                if(array_key_exists($codigo, $this->_produtosOriginal) == true){
                    //uṕdate
                    $this->tabela->update($produto['produto']);
                }else{
                    $this->tabela->create($produto['produto']);
                }
            }
            $lista = $this->tabela->findAll();
            
            foreach ($lista as $produto){
                $this->_produtosOriginal[$produto->getCodigo()]['produto'] = $produto;              
            }
        }
       
    }
    
}
