<?php
class database  {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db   = 'dbbuku';
    private $myconn;

    public function connect() {
        $conn = mysqli_connect($this->host, 
            $this->user, 
            $this->pass, 
            $this->db
        );

        if (!$conn) {
            die('Could not connect to database!');
        } 
        else {
            $this->myconn = $conn;
        }
        return $this->myconn;
    }

    public function close() {
        mysqli_close($this->myconn);
    }

}
