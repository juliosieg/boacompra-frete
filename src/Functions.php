<?php

namespace App;

class Functions {

    /**
    * Ordena um array de acordo com uma chave do mesmo.
    *
    * @param array &$array Array à ser ordenado passado como referência.
    * @param string $key Chave do array à ser usada na ordenação.
    * @return void
    */
    function sortArrayByKey(&$array, $key){
        usort($array,function ($a, $b) use(&$key)
        {
            if($a[$key] == $b{$key}){
                return 0;
            }
            
            return (($a{$key} < $b{$key}) ? -1 : 1);
        });
    }

}