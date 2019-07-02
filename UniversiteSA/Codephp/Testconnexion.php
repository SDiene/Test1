<?php
  /*  class Testconnexion{
        private $host="localhost";
        private $user="root";
        private $db="MiniPOO";
        private $pass="12345678";
        private $conn;*/
        
         function Testconnexion(){
       // $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass);
           /* try {
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass,array (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
                // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "connexion succesful";
            } catch (PDOException $e) {
                 echo 'Erreur de connexion : '.$e->getMessage();
            }*/

            try {
                $conn = new PDO('mysql:host=localhost;dbname=MiniPOO','root','12345678',array (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION));
                // $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "connexion succesful </br>";
            } catch (PDOException $e) {
                 echo 'Erreur de connexion : '.$e->getMessage();
            }
            return $conn;
        } 
   
//    $connect=new Testconnexion;

?>
