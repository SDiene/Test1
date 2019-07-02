<!DOCTYPE html>
<html lang="en-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire de Conatact</title>
    <link rel="stylesheet" href="css/main.css"> 
    <link rel="stylesheet" href="codecss/menu.css"> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>
<body>
    <!-- Notre menu -->
  <div class="page">
    <div class="page__demo">
      <nav class="menu">
        <ul class="menu__list"> 
          <li class="menu__group"><a href="index.php" class="menu__link">add</a></li>
          <li class="menu__group"><a href="Codephp/FindEtu.php" class="menu__link">Liste etudiant</a></li>
          <li class="menu__group"><a href="Codephp/FindB.php" class="menu__link">Liste Bousier</a></li>
          <li class="menu__group"><a href="Codephp/FindNb.php" class="menu__link">Liste NonBousier</a></li>
          <li class="menu__group"><a href="Codephp/check.php" class="menu__link">CheckStatus</a></li>
        </ul>
      </nav>
    </div>
  </div>
    <br> 
    <!-- Contact -->
<form action="index.php" method="POST">
<div class="container">
<div class="row">
    <div class="col-lg-6">
        <pre>
        <label for="matricule">Matricule</label>
        <input type="text" id="matricule" name="matricule" class="col-md-6">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" class="col-md-6"> 
        <label for="prenom">Prenom</label>
        <input type="text" id="prenom" name="prenom" class="col-md-6">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="col-md-6">
        <label for="tel">Téléphone</label>
        <input type="number" id="tel" name="tel" class="col-md-6">
        <label for="date">Date de Naissance</label>
        <input type="date" id="date" name="calender" class="col-md-6">

        <input type="submit" value="Envoyer" name="envoyer" class="col-md-3 btn-primary">
        </pre>
    </div> 
    <div class="col-lg-6"> 
        <pre>
    <input type="radio" name="opt_rad" id="NBoursier" value="oui" onclick="showHideBourse()"> Non Boursier 
    <fieldset id="infoNBoursier">
    <input type="text" name="Adresse" id="Adresse" placeholder=" Adresse" class="col-md-6">          
    </fieldset>
    <input type="radio"name="opt_rad" id="Boursier" value="non" onclick="showHideBourse()" checked> Boursier
    <fieldset id="infoBoursier">
    <input type="text" name="Libelle" id="Libelle" placeholder="Libelle" class="col-md-6 mb-3">
    <select name="TypeBourse" id="TypeBourse" class="col-md-6 mb-3">
    <option disabled="disabled" selected="selected">Type de Bourse</option>
    <option value="20000">Demi-Pension</option>
    <option value="40000">Pension-complete</option>
    </select>
    <input type="radio" name="opt_rad" id="Loger" value="non" onclick="showHideBourse()"/> Loger
    <fieldset id="infoLoger">
    <input type="number" name="Chambre" id="Chambre" placeholder=" Numero Chambre" class="col-md-6 mb-3">
    <input type="text" name="Batiment" id="Batiment" placeholder=" Nom Batiment" class="col-md-6">
    </fieldset>
    <!-- <input type="radio" name="opt_rad" id="NonLoger" value="oui" onclick="showHideBourse()"/> Non Loger
    <fieldset id="infoNonloger">
    <input name="AdresseNl" type="text" placeholder="Adresse *" required="required">
    </fieldset> -->
    </fieldset>    
    </pre>
    </div>
    
</div>
</div>
</form>
        <?php
            require_once ("Codephp/Testconnexion.php");
            require_once "Codephp/Etudiant.php";
            require_once "Codephp/NonBoursier.php";
            require_once "Codephp/Boursier.php";
            require_once "Codephp/Type.php";
            require_once "Codephp/Loger.php";
            require_once "Codephp/EtudiantServices.php";

            if (isset($_POST['envoyer']) && $_POST['Adresse']!="") {
                $matricule=$_POST['matricule'];
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $Numero_Telephone=$_POST['tel'];
                $date_de_naissance=$_POST['calender'];
                $adresse=$_POST['Adresse'];
          
                $NB= new EtudiantServices();
                $nonbourse= new NonBoursier($matricule,$nom,$prenom,$email,$Numero_Telephone,$date_de_naissance,$adresse);
                $NB->addetudiant($nonbourse);
             } // Inserer un Etudiant boursier
             else if (isset($_POST['envoyer']) && $_POST['Libelle']!="" && $_POST['TypeBourse']!="" && $_POST['Batiment']!="") {
                $matricule=$_POST['matricule'];
                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $email=$_POST['email'];
                $Numero_Telephone=$_POST['tel'];
                $date_de_naissance=$_POST['calender'];
                $libelle=$_POST['Libelle'];
                $montant=$_POST['TypeBourse'];  // Montant = TypeBourse
                $chambre=$_POST['Chambre'];
                $batiment=$_POST['Batiment'];
                
                $LG= new EtudiantServices();
                $Loge= new Loger($matricule,$nom,$prenom,$email,$Numero_Telephone,$date_de_naissance,$libelle,$montant,$chambre,$batiment);
                $LG->addetudiant($Loge);
              } 
            else if (isset($_POST['envoyer']) && $_POST['Libelle']!="" && $_POST['TypeBourse']!="") {
              $matricule=$_POST['matricule'];
              $nom=$_POST['nom'];
              $prenom=$_POST['prenom'];
              $email=$_POST['email'];
              $Numero_Telephone=$_POST['tel'];
              $date_de_naissance=$_POST['calender'];
              $libelle=$_POST['Libelle'];
              $montant=$_POST['TypeBourse'];  // Montant = TypeBourse
                
              $B= new EtudiantServices();
              $bourse= new Boursier($matricule,$nom,$prenom,$email,$Numero_Telephone,$date_de_naissance,$libelle,$montant);
              $B->addetudiant($bourse);
            } // Inserer un Etudiant boursier et loger
        ?>
<!-- Script Js de mes boutons -->
<script>
    document.getElementById('infoNBoursier').style.display='none';
    document.getElementById('infoBoursier').style.display='none';
    // document.getElementById('infoNonloger').style.display='none';
      function showHideBourse() {
          if (document.getElementById('NBoursier').checked) {
              document.getElementById('infoNBoursier').style.display='block';
              document.getElementById('infoBoursier').style.display='none';
          }
              else if(document.getElementById('Boursier').checked) {
              document.getElementById('infoBoursier').style.display='block';
              document.getElementById('infoNBoursier').style.display='none';
              document.getElementById('infoLoger').style.display='none';
          }
          if (document.getElementById('Loger').checked) {
              document.getElementById('infoLoger').style.display='block';
            //   document.getElementById('infoNonloger').style.display='none';
          }
          else if (document.getElementById('NonLoger').checked) {
              document.getElementById('infoNonloger').style.display='block';
              document.getElementById('infoNBoursier').style.display='none';
            //   document.getElementById('infoLoger').style.display='none';
          }
      }
  </script>
</body>
</html>
