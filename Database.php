<?php



class Database
{
    private $db;

    private function __construct() {
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }

    public static function getInstance() {
        static $instance;

        if ($instance === null) {
            $instance = new self();
        }
        return $instance;
    }


    public function query(string $sql, array $params = [], $multiple = true) {
        $statement = $this->db->prepare($sql);
        $statement->execute($params);

        if ($multiple) {
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
        } else {
            $result = $statement->fetch(PDO::FETCH_OBJ);
        }

        return $result;
    }

    public function getMultiple(string $sql, array $params = []) {
        return $this->query($sql, $params);
    }

    public function getOne(string $sql, array $params = []){
        return $this->query($sql,$params, false);
    }

    public function getLastInsertedId() {
        return $this->db->lastInsertId();
    }
}