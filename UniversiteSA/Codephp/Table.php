<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 
    <title>Etudiant</title>
</head>
<body>
    <?php
        include ("Testconnexion.php");
        include ("EtudiantServices.php");
    ?>
    <h3 text-align="center">Liste de tous les étudiants</h3>
    <table id="mydatatable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date de naissance</th>
            </tr>
        </thead>
    <?php

    $Objet= new EtudiantServices();
    foreach ($Objet->findAll() as $key) {

        echo '<tbody>
        <tr>';
        echo '<td>' .$key['Matricule']. '</td>';
        echo '<td>' .$key['Nom']. '</td>';
        echo '<td>' .$key['Prenom']. '</td>';
        echo '<td>' .$key['Email']. '</td>';
        echo '<td>' .$key['NumeroTelephone']. '</td>';
        echo '<td>' .$key['Date_de_naissance']. '</td>';
        echo '</tr>
        </tbody>';

    }

    ?>

    </table> 
   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
            $(document).ready(function() {
            $('#mydatatable').DataTable();
            $('.dataTables_length').addClass('bs-select');
            } );
    </script>
</body>
</html>