<html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>



<div class="container">
    <?php

    require_once "./database.php";
    $SQLserver = new SQLserver();

    if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
    ?>
        <div class="container">
            <iframe width="100%" height="700" src="https://maps.google.com/maps?q=<?php echo $_GET['latitude']; ?>,<?php echo $_GET['longitude']; ?>&z=5&output=embed"></iframe>
        </div>
    <?php
    } else { ?>
        <iframe width="100%" height="700" src="https://maps.google.com/maps?q=-14,-51&z=5&output=embed"></iframe>
    <?php
    }
    ?>

    <table class="table table-hover table-striped" id="table-funcionario">
        <thead>
            <tr>
                <th>Nome objeto</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Visualizar Posição atual</th>
                <th>Visualizar histórico posição</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $resultSet =  $SQLserver->listAllObject();
            foreach ($resultSet as $row) {

                echo '<tr><td >' . $row['NAME_OBJECT'] . '</td>';
                echo '<td>' . $row['LATITUDE'] . '</td>';
                echo '<td>' . $row['LONGITUDE'] . '</td>';
            ?>
                <td><a href="index.php<?php echo '?latitude=' . $row['LATITUDE'] . '&longitude=' . $row['LONGITUDE']; ?>"><i class="material-icons">preview</i></a></td>
                <td><a href="historyObject.php?id_object=<?php echo $row['ID_OBJECT'] . '&latitude=' . $row['LATITUDE'] . '&longitude=' . $row['LONGITUDE']; ?>"><i class="material-icons">history</i></a></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

</html>