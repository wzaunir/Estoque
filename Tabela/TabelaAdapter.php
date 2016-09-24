<?php

namespace Hering\Tabela;

/**
 * Description of TabelaAdapter
 *
 * @author aluno
 */
abstract class TabelaAdapter {
    
    private $dbcon;
    
    public function __construct(\PDO $pdo){
        
        $this->dbcon = $pdo;
    }
    public function read()
    {
        
    }
    public function insert()
    {
        
    }
    public function update()
    {
        
    }
    public function delete()
    {
        
        
    }
}
