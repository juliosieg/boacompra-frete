<?php 

namespace App;

class Empresa {

    /*Atributos da Classe*/
    private $nome;
    private $valorFixo;
    private $valorKmKg;
    private $kgMaximo;
    private $valorFixoExcedente;
    private $valorKmKgExcedente;

    
    /**
    * Método construtor
    *
    * @return void
    */
    public function __construct() {
        $this->nome = '';
        $this->valorFixo = 0.00;
        $this->valorKmKg = 0.00;
        $this->kgMaximo = 0;
        $this->valorFixoExcedente = 0.00;
        $this->valorKmKgExcedente = 0.00;
    }

    /**
    * Getter de nome
    *
    * @return string
    */
    public function getNome() {
        return $this->nome;
    }

    /**
    * Setter de nome
    *
    * @param string $nome Nome da empresa
    * @return void
    */
    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    /**
    * Getter de valorFixo
    *
    * @return float
    */
    public function getValorFixo() {
        return $this->valorFixo;
    }

    /**
    * Setter de valorFixo
    *
    * @param float $valorFixo Valor fixo da empresa
    * @return void
    */
    public function setValorFixo(float $valorFixo) {
        $this->valorFixo = $valorFixo;
    }

    /**
    * Getter de valorKmKg
    *
    * @return float
    */
    public function getValorKmKg() {
        return $this->valorKmKg;
    }

    /**
    * Setter de valorKmKg
    *
    * @param float $valorKmKg Valor do km/kg da empresa
    * @return void
    */
    public function setValorKmKg(float $valorKmKg) {
        $this->valorKmKg = $valorKmKg;
    }

    /**
    * Getter de kgMaximo
    *
    * @return int
    */
    public function getKgMaximo() {
        return $this->kgMaximo;
    }

    /**
    * Setter de kgMaximo
    *
    * @param int $kgMaximo Valor da quantidade de kgs máximos sem exceder o limite da empresa
    * @return void
    */
    public function setKgMaximo(int $kgMaximo) {
        $this->kgMaximo = $kgMaximo;
    }

    /**
    * Getter de valorFixoExcedente
    *
    * @return float
    */
    public function getValorFixoExcedente() {
        return $this->valorFixoExcedente;
    }

    /**
    * Setter de valorFixoExcedente
    *
    * @param float $valorFixoExcedente Valor fixo caso o limite de kgs da empresa tenha sido excedido
    * @return void
    */
    public function setValorFixoExcedente(float $valorFixoExcedente) {
        $this->valorFixoExcedente = $valorFixoExcedente;
    }

    /**
    * Getter de valorKmKgExcedente
    *
    * @return float
    */
    public function getValorKmKgExcedente() {
        return $this->valorKmKgExcedente;
    }

    /**
    * Setter de valorKmKgExcedente
    *
    * @param float $valorKmKgExcedente Valor do km/kg da empresa caso tenha excedido o limite.
    * @return void
    */
    public function setValorKmKgExcedente(float $valorKmKgExcedente) {
        $this->valorKmKgExcedente = $valorKmKgExcedente;
    }
 
    /**
     * Retorna o valor fixo da empresa, podendo ser ou não excedente de acordo com o peso.
     *
     * @param int $peso Peso a ser verificado com o limite de kgs da empresa
     * @return float
     */
    public function verificaValorFixo(int $peso){
        return ($peso > $this->getKgMaximo() && $this->getKgMaximo() > 0) ? $this->getValorFixoExcedente() : $this->getValorFixo();
    }

    /**
     * Retorna o valor do km/kg da empresa, podendo ser ou não excedente de acordo com o peso.
     * 
     * @param int $peso Peso a ser verificado com o limite de kgs da empresa
     * @return float
     */
    public function verificaValorKmKg(int $peso){
        return ($peso > $this->getKgMaximo() && $this->getKgMaximo() > 0) ? $this->getValorKmKgExcedente() : $this->getValorKmKg();
    }

}