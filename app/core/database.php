<?php
class Database
{
    // to conn PDO to db
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // PDO obj
    private $dbh;
    // assigned PDO
    private $stmt;
    // hold d query for PDO
    private $error;
    // if $dbh PDO error

    public function __construct()
    {
        // set dsn = data source name
        $dbh = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        // mysql: d db driver
        // host=localhost: d hostname or IP address of d db server
        // dbname=catalog_db: The name of d db to conn

        // configure d PDO prop. PDO work to check, prepared, n execute any data from user before adding to sql query
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            // always check d existing PDO collection before creating new one
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            // handling error for PDO
        );

        // create PDO instance
        try {
            $dbh = new PDO($dbh, $this->user, $this->pass, $options);
            $this->dbh = $dbh;

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
        // if try catch is success, that dbh var will be PDO
    }

    // method for prepare query
    // public function query($query)
    // {
    //     // prepare 
    //     return $this->dbh->prepare($query);
    // }

    // binding val to prepared stmt using named param
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) { //to switch run
                case is_int($value): // if d val is int
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        // value binding to d prepared stmt
        $this->stmt->bindValue($param, $value, $type);
    }

        // return single records of array inside an array
        public function fetchAssoc($query, $data = [])
        {
            $stmt = $this->dbh->prepare($query);
            $this->stmt = $stmt;
    
            if (count($data) > 0) {
                $check = $this->stmt->execute($data);
            } else {
                $stmt = $this->dbh->query($query);
                $check = 0;
                if ($stmt) {
                    $check = 1;
                }
            }
    
            if ($check) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return false;
            // return d single obj, first row found that match d query
        }

    // return single records
    public function single($query, $data = [])
    {
        $stmt = $this->dbh->prepare($query);
        $this->stmt = $stmt;

        if (count($data) > 0) {
            $check = $this->stmt->execute($data);
        } else {
            $stmt = $this->dbh->query($query);
            $check = 0;
            if ($stmt) {
                $check = 1;
            }
        }

        if ($check) {
        return $this->stmt->fetch(PDO::FETCH_OBJ);
        }
        return false;
        // return d single obj, first row found that match d query
    }

    // get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
        // tell how many rows that match d query that have been executed by PDO
    }

    public function show($query, $data = [])
    {
        $stmt = $this->dbh->prepare($query);
        $this->stmt = $stmt;

        if (count($data) > 0) {
            $check = $this->stmt->execute($data);
        } else {
            $stmt = $this->dbh->query($query);
            $check = 0;
            if ($stmt) {
                $check = 1;
            }
        }

        if ($check) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    public function insert($query, $data = [])
    {
        $this->stmt = $this->dbh->prepare($query);

        if (count($data) > 0) {
            $check = $this->stmt->execute($data);
        } else {
            $stmt = $this->dbh->query($query);
            $check = 0;
            if ($stmt) {
                $check = 1;
            }
        }

        if ($check) {
            return true;
        }

        return false;
    }
}