<?php 

namespace App;

use App\Empresa;
use App\Produto;
use App\Functions;

class Transporte {

    /*Atributos da Classe*/
    private $distancia;
    private $empresas;
    private $produto;
    private $fretes;

    /**
    * Método construtor
    *
    * @return void
    */
    public function __construct() {
        $this->distancia = 0;
        $this->empresas = [];
        $this->produto = new Produto();
        $this->fretes = [];
    }

    /**
    * Getter de distancia
    *
    * @return string
    */
    public function getDistancia() {
        return $this->distancia;
    }

    /**
    * Setter de distancia
    *
    * @param int $distancia Distância do transporte
    * @return void
    */
    public function setDistancia(int $distancia) {
        $this->distancia = $distancia;
    }

    /**
    * Getter de empresas
    *
    * @return array
    */
    public function getEmpresas() {
        return $this->empresas;
    }

    /**
    * Getter de produto
    *
    * @return Produto
    */
    public function getProduto() {
        return $this->produto;
    }

    /**
    * Setter de produto
    *
    * @param Produto $produto Produto à ser transportado
    * @return void
    */
    public function setProduto(Produto $produto) {
        $this->produto = $produto;
    }

    /**
    * Função que adiciona uma empresa dentro do array de empresas.
    *
    * @param Empresa $empresa Empresa à ser adicionada para posterior cálculo de fretes.
    * @return bool
    */
    public function adicionarEmpresa(Empresa $empresa) {
        array_push($this->empresas, $empresa);
        return true;
    }

    /**
    * Função que adiciona um frete dentro do array de fretes.
    *
    * @param array $frete Frete calculado para posterior ordenação.
    * @return bool
    */
    public function adicionarFrete(array $frete) {
        array_push($this->fretes, $frete);
        return true;
    }

    /**
    * Getter de fretes
    *
    * @return array
    */
    public function getFretes() {
        return $this->fretes;
    }

    /**
    * Função que limpa o atributo de fretes
    *
    * @return void
    */
    public function limpaFretes() {
        $this->fretes = [];
    }

    /**
    * Função que calcula e ordena os fretes
    *
    * @return array
    */
    public function calculaFretes(){

        $this->limpaFretes();

        foreach ($this->getEmpresas() as $empresa){
            $peso = $this->produto->getPeso();
            $valorFixo = $empresa->verificaValorFixo($peso);
            $valorKmKg = $empresa->verificaValorKmKg($peso);

            $calculo = $valorFixo + ($peso  * $this->getDistancia() * $valorKmKg);
            $this->adicionarFrete(['empresa' => $empresa->getNome(), 'valor' => $calculo]);
        }

        $fretes = $this->getFretes();
        Functions::sortArrayByKey($fretes, 'valor');

        return $fretes;
        
   }

}