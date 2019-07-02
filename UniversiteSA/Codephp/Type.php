<?php
    class Type{
        private $libelle;
        private $Montant;

        public function __construct($libelle, $Montant)
        {
            $this->libelle=$libelle;
            $this->Montant=$Montant;
        }
  
        /**
         * Get the value of libelle
         */ 
        public function getLibelle()
        {
                return $this->libelle;
        }

        /**
         * Set the value of libelle
         *
         * @return  self
         */ 
        public function setLibelle($libelle)
        {
                $this->libelle = $libelle;

                return $this;
        }

        /**
         * Get the value of Montant
         */ 
        public function getMontant()
        {
                return $this->Montant;
        }

        /**
         * Set the value of Montant
         *
         * @return  self
         */ 
        public function setMontant($Montant)
        {
                $this->Montant = $Montant;

                return $this;
        }
    }
?>