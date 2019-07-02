<?php
    
    class EtudiantServices{ 
        public function addetudiant(Etudiant $etudiant) {
            $bdd= Testconnexion();
            $req = $bdd->prepare("INSERT INTO `Etudiant`(`Matricule`, `Nom`, `Prenom`, `Email`, `NumeroTelephone`, `Date_de_naissance`)
            VALUES ( :Matricule, :Nom, :Prenom, :Email, :NumeroTelephone, :Date_de_naissance)");  
  
// Maintenant on lie chacune de nos marqueurs pour recevoir les entrée utilisateurs

  $req->bindValue(':Matricule',$etudiant->getMatricule(),PDO::PARAM_STR); 
  $req->bindValue(':Nom',$etudiant->getNom(),PDO::PARAM_STR);   
  $req->bindValue(':Prenom',$etudiant->getPrenom(),PDO::PARAM_STR);  
  $req->bindValue(':Email',$etudiant->getEmail(),PDO::PARAM_STR); 
  $req->bindValue(':NumeroTelephone',$etudiant->getNumero_Telephone(),PDO::PARAM_INT);  
  $req->bindValue(':Date_de_naissance',$etudiant->getDate_de_naissance());  

  $req->execute(); 
  if ($req) {
    echo "Un etudiant ";
  } else {
    echo "Aucune Insertion cote Etudiant simple";
  }  
  
// Inserer un etudiant Non Boursier

  $reqNB=$bdd->query('SELECT MAX(idEtudiant) AS id FROM Etudiant;');
    while ($reponse=$reqNB->fetch()) {
            $id=$reponse["id"];
            }
    if(get_class($etudiant)=='NonBoursier') { 
        $reqNB=$bdd->prepare("INSERT INTO `Non_Boursiers`(`idEtudiant`, `Adresse`) 
        values (:idEtudiant, :Adresse)");
      
    $reqNB->bindValue(':idEtudiant',$id); 
    $reqNB->bindValue(':Adresse',$etudiant->getAdresse()); 
    $reqNB->execute();
        if ($reqNB) {
          echo "Non Boursier vient d'etre inserer </br>"; 
        } else {
          echo "L'Etudiant non boursier n'est pas inserer</br>";
        } exit;
    } 
   
   // Inserer un Etudiant Boursier

   $reqB=$bdd->query('SELECT MAX(idEtudiant) AS id1 FROM Etudiant;');
    while ($reponse1=$reqB->fetch()) {
            $id1=$reponse1["id1"];
            }
   $reqB=$bdd->query('SELECT MAX(idType) AS id2 FROM Boursier;');
   while ($reponse2=$reqB->fetch()) {
           $id2=$reponse2["id2"];
           }
  // Inserer un Etudiant Boursier et loger en Plus  
    
  $reqL=$bdd->query('SELECT MAX(idEtudiant) AS id3 FROM Etudiant;');
  while ($reponse2=$reqL->fetch()) {
          $id3=$reponse2["id3"];
          }
          // var_dump($id3);

  $reqL=$bdd->query('SELECT MAX(idChambre) AS id4 FROM Loger;');
  while ($reponse3=$reqL->fetch()) {
          $id4=$reponse3["id4"];
          }
          // var_dump($id4);

  if (get_class($etudiant)=='Loger') {

    $reqBL=$bdd->prepare("INSERT INTO `Boursier`(`idEtudiant`, `idType`)  
      values(:idEtudiant, :idType)");
      $reqBL->bindValue(':idEtudiant',$id1); 
      $reqBL->bindValue(':idType',$id2); 
      $reqBL->execute();
      
      // $reqL=$bdd->prepare("INSERT INTO `Chambre`(`NumeroChambre`, `idBatiment` )  
      //   values(:NumeroChambre, :idBatiment)");
      //    $reqL->bindValue(':NumeroChambre',$etudiant->getNumeroChambre()); 
      //    $reqL->bindValue(':idBatiment',$etudiant->getNomBatiment()); 
      //    $reqL->execute(); 
      
    $reqL=$bdd->prepare("INSERT INTO `Loger`(`idEtudiant`, `idChambre`)  
        values(:idEtudiant, :idChambre)");
        $reqL->bindValue(':idEtudiant',$id3); 
        $reqL->bindValue(':idChambre',$id4); 

        $reqL->execute(); 
          if($reqL){
            echo " loger a ete inserrer!!!";
        }else {
          echo " loger n'est pas inserrer";
        }    
    }
           
    if (get_class($etudiant)=='Boursier') {
      $reqB=$bdd->prepare("INSERT INTO `Boursier`(`idEtudiant`, `idType`)  
        values(:idEtudiant, :idType)");
        $reqB->bindValue(':idEtudiant',$id1); 
        $reqB->bindValue(':idType',$id2); 
        $reqB->execute();
    
        if($reqB){
            echo " boursier a ete inserrer!!!";
        }else {
            echo "L'etudiant boursier n'est pas inserrer";
        } 
    }

  }

  //find All etudiant

  public function findAll(){

    $bdd= Testconnexion();
      
    $sql= $bdd->query("SELECT * FROM Etudiant;");
      
    while($data = $sql->fetch(PDO::FETCH_ASSOC)){
      
    $Etu[]=$data;
      
    }
    
    return $Etu;
  }  

  //find All etudiant Non Boursiers

  public function findNBoursiers(){

    $bdd= Testconnexion();
      
    $sql1= $bdd->query("SELECT `Matricule`, `Nom`, `Prenom`, `Email`, `NumeroTelephone`, `Date_de_naissance`, `Adresse` FROM Non_Boursiers,Etudiant WHERE Etudiant.idEtudiant=Non_Boursiers.idEtudiant");
      
    while($nb = $sql1->fetch(PDO::FETCH_ASSOC)){
      
    $EtuNb[]=$nb;
      
    }
    
    return $EtuNb;
  }  

  //find All etudiant Boursiers

  public function findBoursier(){

    $bdd= Testconnexion();
      
    $sql2= $bdd->query("SELECT `Matricule`, `Nom`, `Prenom`, `Email`, `NumeroTelephone`, `Date_de_naissance`, `Libelle`, `Montant` FROM Boursier,Etudiant,Type WHERE Etudiant.idEtudiant=Boursier.idEtudiant AND Boursier.idType=Type.idType");
      
    while($b = $sql2->fetch(PDO::FETCH_ASSOC)){
      
    $EtuB[]=$b;
      
    }
    
    return $EtuB;
  }  
 // find All Boursier et loger

  public function findBL(){

    $bdd= Testconnexion();
      
    $sql3= $bdd->query("SELECT DISTINCT Etudiant.Matricule as Matricule, Etudiant.Nom as Nom, Etudiant.Prenom as Prenom, Etudiant.NumeroTelephone as NumeroTelephone , Etudiant.Email as Email, Etudiant.Date_de_naissance as Date_de_naissance, Type.Libelle as Libelle, Type.Montant as Montant, Chambre.NumeroChambre as NumeroChambre, Batiment.Nom_Batiment as Nom_Batiment FROM Etudiant, Type, Loger,Chambre, Batiment, Boursier WHERE Etudiant.idEtudiant = Boursier.idEtudiant AND Loger.idEtudiant=Boursier.idEtudiant AND Type.idType=Boursier.idType AND Loger.idChambre=Chambre.idChambre AND Chambre.idBatiment=Batiment.idBatiment");
      
    while($b = $sql3->fetch(PDO::FETCH_ASSOC)){
      
    $EtuBL[]=$b;
      
    }
    
    return $EtuBL;
  }

}
   
?>
