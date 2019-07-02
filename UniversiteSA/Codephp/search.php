<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="search.php" method="POST">
        <label for="search">Search Something </label>
        <input type="text" name="matricule" placeholder="Search matricule">
        <input type="submit" name="rechercher">
    </form>

    <?php
    include ("Testconnexion.php");
    include ("Etudiant.php");
    include ("EtudiantServices.php");
    $list= new EtudiantServices();
        if (isset($_POST['rechercher'])) {
        $valeur=$_POST['matricule'];

            echo '<table id="mydatatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Date de naissance</th>
                </tr>
            </thead>';

            foreach ($list->findsearch($valeur) as $val) {

                echo '<tbody>
                <tr>';
                echo '<td>' .$val['Matricule']. '</td>';
                echo '<td>' .$val['Nom']. '</td>';
                echo '<td>' .$val['Prenom']. '</td>';
                echo '<td>' .$val['Email']. '</td>';
                echo '<td>' .$val['NumeroTelephone']. '</td>';
                echo '<td>' .$val['Date_de_naissance']. '</td>';
                echo '</tr>
                </tbody>';
        
            }
            echo '</table>';
        }
        // echo '</br> Le boucle foreach ne vous fera plus peur';
        // $arrayName = array('Nom' => 'diene','Prenom' =>'senghor','firtName' =>'arame','lastName' =>'thioumber');
        // echo '</br>';

        // afficher uniquement un attribut
        // foreach ($arrayName as $key => $lire) {
        //     echo $lire. ' ';
        // } echo '</br> </br>';
        // // afficher tous le tab
        // foreach ($arrayName as $key => $lire) {
        //     echo "$lire est votre $key </br>";
        // }

        // $arraySelect= array('US' => 'Etat Unis','FR' => 'France','SN' => 'Sénégal','ML' => 'Mali' );

        // echo '<select>';
        // foreach ($arraySelect as $key => $value) {
        //     echo "<option value=\"$key\">$value</option>";
        // }
        // echo '</select>';
    ?>
    
</body>
</html>