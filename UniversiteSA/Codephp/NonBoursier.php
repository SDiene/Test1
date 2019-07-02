<?php
require_once ("Etudiant.php");
    class NonBoursier extends Etudiant{
        private $adresse; 
        public function __construct($matricule="", $nom="", $prenom="", $email="", $Numero_Telephone="", $date_de_naissance="", $adresse="")
        {
            parent:: __construct($matricule,$nom,$prenom,$email,$Numero_Telephone,$date_de_naissance);
            $this->adresse=$adresse;
        }
    
        public function getAdresse()
        {
            return $this->adresse;
        }
 
        public function setAdresse($adresse)
        {
            $this->adresse = $adresse;

            return $this;
        }
 
    }
?>