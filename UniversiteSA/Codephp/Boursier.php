<?php
/**
 * Le constructeur permet de rendre la classe immediatement opérationnelle et utilisable en 
 * definissant des propriétés dés qu'un utilisateur va créer une nouvelle instance de cette classe
 * 
 * Maintenant il faut savoir que l'heritage est un moyen simple pour favoriser la réutilisation du code
 * les classe filles pouront réutiliser les comportements et les données de leurs classe parent (mere)
 */
    require ("Type.php");
    class Boursier extends Etudiant{ 
        private $libelle;  
        private $montant;  

        public function __construct($matricule="",$nom="",$prenom="",$email="",$Numero_Telephone="",$date_de_naissance="",$libelle="",$montant="")
        {
            parent:: __construct($matricule,$nom,$prenom,$email,$Numero_Telephone,$date_de_naissance);
            
            $this->libelle = $libelle;  
            $this->montant = $montant;  
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
        public function typeBourse(){

        } 

        

        /**
         * Get the value of montant
         */ 
        public function getMontant()
        {
                return $this->montant;
        }

        /**
         * Set the value of montant
         *
         * @return  self
         */ 
        public function setMontant($montant)
        {
                $this->montant = $montant;

                return $this;
        }
    }   

?>