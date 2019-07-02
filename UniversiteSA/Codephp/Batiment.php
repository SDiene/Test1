<?php
    class Batiment{
        private $NomBatiment;
        public function __construct($NomBatiment)
        {
            $this->NomBatiment=$NomBatiment;
        }
  

        /**
         * Get the value of NomBatiment
         */ 
        public function getNomBatiment()
        {
                return $this->NomBatiment;
        }

        /**
         * Set the value of NomBatiment
         *
         * @return  self
         */ 
        public function setNomBatiment($NomBatiment)
        {
                $this->NomBatiment = $NomBatiment;

                return $this;
        }
    }
?>