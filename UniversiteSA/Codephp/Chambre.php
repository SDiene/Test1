<?php
    require ("Batiment.php");
    class Chambre{
         private $NumeroChambre;

         public function __construct($NumeroChambre)
         {
             $this->NumeroChambre=$NumeroChambre;
         }

         /**
          * Get the value of NumeroChambre
          */ 
         public function getNumeroChambre()
         {
                return $this->NumeroChambre;
         }

         /**
          * Set the value of NumeroChambre
          *
          * @return  self
          */ 
         public function setNumeroChambre($NumeroChambre)
         {
                $this->NumeroChambre = $NumeroChambre;

                return $this;
         }
    } 
?>