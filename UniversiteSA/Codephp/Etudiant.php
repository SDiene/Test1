<?php
/**
 *création de notre class Etudiant qui va servir à un modele de donnée définissant la structure
 *commune à tous les objets qui seront crées à partir d'elle.
 * Les fonctions définies à l'interieur d'une classe sont appelés des méthodes
 * Il est possible de declarer des methodes dont la definition n'est pas encore connue dans la
 * classe mére mais le seront dans une classe fille: on parle de methode abstraite
 * Une classe qui contient au moins une methode abstraite doit elle aussi etre déclaré et ne 
 * peut etre instanciée : on parle de classe abstraite
 */
     class Etudiant{
        /**
         * Attribust de ma classe
         */
        private $matricule;
        private $nom;
        private $prenom;
        private $email;
        private $Numero_Telephone;
        private $date_de_naissance;

// création de notre constructeur avec nos differents attributs

        public function __construct($matricule="", $nom="", $prenom="", $email="", $Numero_Telephone="", $date_de_naissance="")
        {
            // this c'est le fait referent à l'objet courrant 
            // $a =  new a this veut dire a donc c'est l'objet qu'on aabesoin pour appeler a
            $this->matricule=$matricule;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->email=$email;
            $this->Numero_Telephone=$Numero_Telephone;
            $this->date_de_naissance=$date_de_naissance;
        }  

        /**
         * Get attribust de ma classe qui sert à recuperer les valeurs appelées
         */ 
        public function getMatricule()
        {
                return $this->matricule;
        }

        /**
         * Set attribust de ma classe qui sert à modifier mettre à jour les valeurs appelées
         *
         * @return  self
         */ 
        public function setMatricule($matricule)
        {
                $this->matricule = $matricule;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this->nom;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom()
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom($prenom)
        {
                $this->prenom = $prenom;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of Numero_Telephone
         */ 
        public function getNumero_Telephone()
        {
                return $this->Numero_Telephone;
        }

        /**
         * Set the value of Numero_Telephone
         *
         * @return  self
         */ 
        public function setNumero_Telephone($Numero_Telephone)
        {
                $this->Numero_Telephone = $Numero_Telephone;

                return $this;
        }

        /**
         * Get the value of date_de_naissance
         */ 
        public function getDate_de_naissance()
        {
                return $this->date_de_naissance;
        }

        /**
         * Set the value of date_de_naissance
         *
         * @return  self
         */ 
        public function setDate_de_naissance($date_de_naissance)
        {
                $this->date_de_naissance = $date_de_naissance;

                return $this;
        }
        // public function infos(){
        //         //return $this->matricule="";
        // }
    }

?> 