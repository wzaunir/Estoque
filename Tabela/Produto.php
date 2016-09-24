<?php
namespace Hering\Tabela;
/**
 * Description of Produto
 * Mapeia os produtos da base de dados
 *
 * @author Welington
 */
class Produto 
{
    private $codigo;
    private $nome;
    private $tamanho;
    private $valor;
    private $modelo;
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTamanho() {
        return $this->tamanho;
    }

    public function getValor() {
        return $this->valor;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
        return $this;
    }

    public function setValor($valor) {
        $this->valor = $valor;
        return $this;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
        return $this;
    }


}
