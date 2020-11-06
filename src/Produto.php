<?php 

namespace App;

class Produto {

    /*Atributos da Classe*/
    private $descricao;
    private $peso;

    /**
    * Método construtor
    *
    * @return void
    */
    public function __construct() {
        $this->descricao = '';
        $this->peso = 0;
    }

    /**
    * Getter de nome
    *
    * @return string
    */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
    * Getter de nome
    *
    * @return int
    */
    public function getPeso() {
        return $this->peso;
    }

    /**
    * Setter de valorFixo
    *
    * @param string $descricao Descrição do produto
    * @return void
    */
    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
    }

    /**
    * Setter de valorFixo
    *
    * @param int $peso Peso do produto
    * @return void
    */
    public function setPeso(int $peso) {
        $this->peso = $peso;
    }
}