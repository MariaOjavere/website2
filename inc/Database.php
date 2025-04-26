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
                'mysql:host='.$this->host.';dbname='.$this->baseName.'',
                $this->user, 
                $this->password, 
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    public function getConnection() {
        return $this->conn;
    }

    public function prepare($query) {
        return $this->conn->prepare($query);
    }

    function getOne($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetch();
        return $response;
    }

    function getAll($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetchAll();
        return $response;
    }

    function executeRun($query, $params = []) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    function getLastId() {
        $lastId = $this->conn->lastInsertId();
        return $lastId;
    }
}
?>