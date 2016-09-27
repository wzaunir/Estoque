<?php

namespace Hering\Tabela;

require_once 'TabelaAdapter.php';
/**
 * Description of ProdutoTabela
 *
 * @author aluno
 */
class ProdutoTabela extends TabelaAdapter
{
    /**
     * Busca pela chave primaria
     * @param int $id
     * @return objeto Tabela\Produto
     */
    public function  find($id){
        $sql = "Select * from produto where codigo = '$id'";
        
        return $this->getDb()->query($sql)->fetchObject('Hering\Tabela\Produto');
    }
    /**
     * Retorna um array com todos registros
     * @return  array de objetos Tabela\Produto;
     */
    public function findAll(){
         $sql = "Select * from produto";
         return $this->getDb()
                     ->query($sql)
                     ->fetchAll(\PDO::FETCH_CLASS,'Hering\Tabela\Produto');
        
    }
    public function update(Produto $produto){
        $sql = "UPDATE  produto SET  
            nome    =  '".$produto->getNome()."',
            tamanho =  '".$produto->getTamanho()."',
            valor   =  '".$produto->getValor()."',
            modelo  =  '".$produto->getModelo()."' 
            WHERE  codigo =".$produto->getCodigo()."";
        $this->getDb()->exec($sql);
    }
    public function create(Produto $produto) {
        $sql = "INSERT INTO produto("
                . "codigo, "
                . "nome, "
                . "tamanho, "
                . "valor, "
                . "modelo) "
                . "VALUES "
                . "('".$produto->getCodigo()."',"
                . "'".$produto->getNome()."',"
                . "'".$produto->getTamanho()."',"
                . "'".$produto->getValor()."',"
                . "'".$produto->getModelo()."')";
         $this->getDb()->query($sql);
       
    }
}
