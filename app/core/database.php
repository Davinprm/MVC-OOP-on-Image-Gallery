<?php
class Database
{
    public function db_connect()
    {
        // to handle any exceptions that might occur during d db conn process
        try {
            $string = "mysql:host=localhost;dbname=catalog_db;";
            // mysql: d db driver
            // host=localhost: d hostname or IP address of d db server
            // dbname=catalog_db: The name of d db to conn

            return $db = new PDO($string, 'root', '');
            // first param is d conn $string
            // second param is d username
            // third param is the pass an empty string, which means the default pass

        } catch (PDOException $e) {
            die($e->getMessage());
            // if an exception occurs during d db conn
            // die stmnt will display d error message to d user
            // $e var is an instance of d PDOException class, which represents d exception that was thrown
        }
    }

    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        // call conn method to establish a conn to d db n save it to DB var

        $stm = $DB->prepare($query);
        // prepare d SQL query using PDO prepare method to be executed with given data

        if (count($data) > 0) 
        // return d number of elmnt in array or number of char in a string.
        {
            $check = $stm->execute($data);
            // execute d prepared stmt or query below, depending on d condition above
        } else {
            $check = $stm->query($data);
        }

        if ($check) {
            return $stm->fetchAll(PDO::FETCH_OBJ);
            // return d result of d query using fetchAll method, will return d result as an array of obj
        }
        
        return false;
    }

    // same code as above
    public function write($query, $data = [])
    {
        $DB = $this->db_connect();
        $stm = $DB->prepare($query);

        if (count($data) > 0) {
            $check = $stm->execute($data);
        } else {
            $check = $stm->query($data);
        }

        if ($check) {
            return true;
        }

        return false;
    }
}