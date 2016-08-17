<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "root";
    private $dbName = 'diveintofame';

    public $connectionStatus = false;

    public function connectToDatabase() {

        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);

        if($conn->connect_error) {
            $this->connectionStatus = false;
        } else {
            $this->connectionStatus = true;
        }

        return $conn;
    }

    public function closeConnection($conn) {
        $conn->close();
    }

    public function getDataFromDB($conn, $sql_string) {
        return $conn->query($sql_string);
    }

    public function insertDataIntoDB($conn, $sql_string) {

        if($conn->query($sql_string) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

}