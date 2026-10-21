<?php
  
  class Animal {
        const TIPO = "Animal";

        public function emitirSom() : void {
            echo "Som qualuqer";
        }

    }

    class Cachorro extends Animal {
        public function emitirSom() : string {
            parent::emitirSom();
            echo "e latido";
        }
    }

    echo Cachorro::identificar();
?>