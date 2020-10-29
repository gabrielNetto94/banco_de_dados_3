<?php

define('DB_HOST', "UTI02DT03SMA01\\SQLEXPRESS");
define('DB_USER', "sa");
define('DB_PASSWORD', 'Root@root');
define('DB_NAME', "DB_LOCATION");
define('DB_DRIVER', "sqlsrv");

class SQLserver
{
    public static function getConnection()
    {

        $pdoConfig  = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=" . DB_NAME . ";";

        try {
            if (!isset($connection)) {
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers()) . "\n\n\n";
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
        }
    }

    public static function closeConnection()
    {

        $pdoConfig  = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
        $pdoConfig .= "Database=" . DB_NAME . ";";

        try {
            if (!isset($connection)) {
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
        }
    }

    function executeQuery($query)
    {
        $resultSet = $this->getConnection()->query($query);

        $this->closeConnection();

        return $resultSet;
    }

    function listAllObject(){
        $query = "select O.ID_OBJECT AS ID_OBJECT, o.name as NAME_OBJECT, l.LATITUDE AS LATITUDE, l.LONGITUDE AS LONGITUDE
                    from LOCATION l
                    join OBJECT o on o.ID_OBJECT = l.FK_ID_OBJECT";

        $resultSet = $this->executeQuery($query);

        return $resultSet;
    }

    function searchObject($id){
        $query = "select O.NAME AS NAME_OBJECT, LOCATION.LATITUDE AS LATITUDE, LOCATION.LONGITUDE AS LONGITUDE, LOCATION.TIME_START AS TIME_START,LOCATION.TIME_END AS TIME_END 
        from LOCATION
        for system_time
        between '2000-01-01 00:00:00.0000000' and '2022-01-01 00:00:00.0000000'
        JOIN OBJECT O ON O.ID_OBJECT = LOCATION.FK_ID_OBJECT
        where ID_LOCATION = $id";

        $resultSet = $this->executeQuery($query);

        return $resultSet;
    }

    function createObject(){
        $query = "INSERT INTO OBJECT VALUES";

        $resultSet = $this->executeQuery($query);

        return $resultSet;
    }
}
