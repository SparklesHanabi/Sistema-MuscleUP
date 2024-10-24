<?php
    class ProdutoDTO{
        private $idPro;
        private $nomePro;
        private $valorPro; 
        private $imagemPro;
        private $marcaPro;
        
        public function setMarcaPro($marcaPro){
            $this->marcaPro = $marcaPro;
        }
        public function getMarcaPro(){
            return $this->marcaPro;
        }
        //
        public function setImagemPro($imagemPro){
            $this->imagemPro = $imagemPro;
        }
        public function getImagemPro(){
            return $this->imagemPro;
        }
        
        public function setValorPro($valorPro){
            $this->valorPro = $valorPro;
        }
        public function getValorPro(){
            return $this->valorPro;
        }
        
        public function setNomePro($nomePro){
            $this->nomePro = $nomePro;
        }
        public function getNomePro(){
            return $this->nomePro;
        }
        
        public function setIdPro($idPro){
            $this->idPro = $idPro;
        }
        public function getIdPro(){
            return $this->idPro;
        }
        
    }
?>