<?php

namespace Hering\Tabela;

/**
 * Description of TabelaAdapter
 *
 * @author aluno
 */
abstract class TabelaAdapter {
    /**
    *
    * @var \PDO
    */
    private $dbcon;
    
    public function __construct(\PDO $pdo){
        
        $this->dbcon = $pdo;
    }
    /**
     * 
     * @return PDO conexão
     */
    protected function getDb(){
        return $this->dbcon;
    }


    public function create()
    {
        
    }
    public function read()
    {
        
    }
    public function update()
    {
        
    }
    public function delete()
    {
        
        
    }
}
