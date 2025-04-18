<?php

class Database {

    private $conn;
    private $host;
    private $user;
    private $password;
    private $baseName;

    function __construct() {

        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->baseName = 'signoudb';
        $this->connect();
    }

    function __destruct() {
        $this->disconnect();
    }

    function connect() {
        try {
            $this->conn = new PDO(
                    'mysql:host='.$this->host.''
                    .';dbname='.$this->baseName.'',
                    $this->user, 
                    $this->password, 
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (Exception $e) {
            die('Connection failed : '.$e->getMessage());
        }

        return $this->conn;
    }

    function disconnect() {
        if ($this->conn) {
            $this->conn = null;
        }
    }

    public function prepare($query) {
        return $this->conn->prepare($query);
    }

    function getOne($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetch();
        return $response;
    }

    function getAll($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetchAll();
        return $response;
    }

    function executeRun($query) {
        $response = $this->conn->exec($query);
        return $response;
    }

    function getLastId() {
        $lastId = $this->conn->lastInsertId();
        return $lastId;
    }
}
    

?>