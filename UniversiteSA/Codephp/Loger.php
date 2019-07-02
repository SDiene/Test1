<?php
    include ("Chambre.php");
    class Loger extends Boursier{


        
        public function __construct($matricule="",$nom="",$prenom="",$email="",$Numero_Telephone="",$date_de_naissance="")
        {
            parent:: __construct($matricule,$nom,$prenom,$email,$Numero_Telephone,$date_de_naissance);
        }
    }
?>