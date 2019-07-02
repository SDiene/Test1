<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../codecss/menu.css"> 
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 
    <title>liste boursier</title>
</head>
<body>
<?php include ("menu.php");?>
<br>
<h3 align=center>Liste des étudiants Non boursier</h3>
    <table id="mydatatable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date de naissance</th>
            <th>Type de bourse</th>
            <th>Montant</th>
        </tr>
    </thead>

    <tbody>
    <?php
    include ("Testconnexion.php");
    include ("EtudiantServices.php");

    // Liste de tous les etudiants boursiers 

    $list= new EtudiantServices();
   
    foreach ($list->findBoursier() as $val) {

        echo '<tr>';
        echo '<td>' .$val['Matricule']. '</td>';
        echo '<td>' .$val['Nom']. '</td>';
        echo '<td>' .$val['Prenom']. '</td>';
        echo '<td>' .$val['Email']. '</td>';
        echo '<td>' .$val['NumeroTelephone']. '</td>';
        echo '<td>' .$val['Date_de_naissance']. '</td>';
        echo '<td>' .$val['Libelle']. '</td>';
        echo '<td>' .$val['Montant']. '</td>';
        echo '</tr>';

    }
    ?>
    </tbody>
    </table>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#mydatatable').DataTable({
            dom: "<'row'<'col-sm-4'f><'col-sm-offset-2 col-sm-6'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-xs-12 col-sm-7 col-sm-offset-5 text-right'p>>",
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
            "oLanguage": {
                "oPaginate": {
                    "sFirst": "Premier",
                    "sLast": "Dérnier",
                    "sNext": "Suivant",
                    "sPrevious": "Précedent",
                },
                "sSearch": "Recherche:",
                "sEmptyTable": "Aucune donnée disponible",
                "sInfo": "affichage de _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty": "Aucune donnée disponible",
                "sInfoFiltered": "(Recherché sur _MAX_ éléments au total)",
                "infoPostFix": "",
                "thousands": ",",
                "sLengthMenu": "Afficher par _MENU_ éléments",
                "loadingRecords": "Chargement...",
                "processing": "procéssus...",
                "sZeroRecords": "Aucun résultat trouvé",
            },
            "iDisplayLength": 10,
            "lengthChange": false,
            "info": false,
            responsive: false
        });
    });
</script>

</body>
</html>