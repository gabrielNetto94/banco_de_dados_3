<?php

if (isset($_POST['address'])) {
    $address = $_POST['address'];
?>

    <iframe width="100%" height="700" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>

<?php
}

if (isset($_POST["latitude"]) && isset($_POST["longitude"])) {
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
?>

    <iframe width="100%" height="700" src="https://maps.google.com/maps?q=<?php echo $latitude; ?>,<?php echo $longitude; ?>&output=embed"></iframe>

<?php
}
?>

<form method="POST">

    <input type="text" name="address" placeholder="Type any address">

    <button type="submit">Buscar endereço</button>
</form>

<form method="POST">

    <input type="text" name="latitude" placeholder="Latitude">
    <input type="text" name="longitude" placeholder="Longitude">

    <button type="submit">Buscar endereço</button>
</form>