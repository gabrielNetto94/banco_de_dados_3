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

    if (isset($_GET['time_start']) && isset($_GET['time_end'])) {

        $resultSet =  $SQLserver->timeDifference($_GET['time_start'], $_GET['time_end']);
        
        foreach ($resultSet as $row) {

            echo '<p>' . $row['StringFormat'] . '</p>';
            
        }
    }

    if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
    ?>
        <div class="container">
            <iframe width="100%" height="700" src="https://maps.google.com/maps?q=<?php echo $_GET['latitude']; ?>,<?php echo $_GET['longitude']; ?>&z=5&output=embed"></iframe>
        </div>
    <?php
    }
    ?>

    <button onclick="window.location.href='index.php'">Voltar</button>
    <table class="table table-hover table-striped" id="table-funcionario">
        <thead>
            <tr>
                <th>Nome objeto</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Tempo inicial</th>
                <th>Tempo final</th>
                <th>Tempo desde início</th>
                <th>Visualizar Posição</th>

            </tr>
        </thead>
        <tbody>

            <?php

            $resultSet =  $SQLserver->searchObject($_GET['id_object']);

            foreach ($resultSet as $row) {

                echo '<tr><td >' . $row['NAME_OBJECT'] . '</td>';
                echo '<td>' . $row['LATITUDE'] . '</td>';
                echo '<td>' . $row['LONGITUDE'] . '</td>';
                echo '<td>' . $row['TIME_START'] . '</td>';
                echo '<td>' . $row['TIME_END'] . '</td>';
            ?>
                <td><a href="historyObject.php<?php echo '?time_start=' . substr($row['TIME_START'], 0, 19) . '&time_end=' . substr($row['TIME_END'], 0, 19) . '&id_object=' . $_GET['id_object']; ?>"><i class="material-icons">access_time</i></a></td>
                <td><a href="historyObject.php<?php echo '?latitude=' . $row['LATITUDE'] . '&longitude=' . $row['LONGITUDE'] . '&id_object=' . $_GET['id_object']; ?>"><i class="material-icons">preview</i></a></td>

                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>

</html>