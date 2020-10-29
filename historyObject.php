<?php

require_once "./database.php";
$SQLserver = new SQLserver();

if (isset($_GET['latitude']) && isset($_GET['longitude'])) {
?>
    <iframe width="100%" height="700" src="https://maps.google.com/maps?q=<?php echo $_GET['latitude']; ?>,<?php echo $_GET['longitude']; ?>&output=embed"></iframe>
<?php
}
?>

<table class="table table-hover table-striped" id="table-funcionario">
    <thead>
        <tr>
            <th>Nome objeto</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Tempo inicial</th>
            <th>Tempo final</th>
            <th>Visualizar Posição</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_GET['id_object'])){
            $id_object = $_GET['id_object'];
        }
        $resultSet =  $SQLserver->searchObject($id_object);
        foreach ($resultSet as $row) {

            echo '<tr><td >' . $row['NAME_OBJECT'] . '</td>';
            echo '<td>' . $row['LATITUDE'] . '</td>';
            echo '<td>' . $row['LONGITUDE'] . '</td>';
            echo '<td>' . $row['TIME_START'] . '</td>';
            echo '<td>' . $row['TIME_END'] . '</td>';
        ?>
            <td><a href="index.php<?php echo '?latitude=' . $row['LATITUDE'] . '&longitude=' . $row['LONGITUDE']; ?>"><i class="material-icons">preview</i></a></td>
            
            </tr>

        <?php } ?>
    </tbody>
</table>

<html>

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
</html>