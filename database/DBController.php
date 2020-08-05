<?php
class DBController
{
    //database connection properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database ="shopee";
    //connection property
    public $conn = null;  //null is default value

    //call constructor
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if($this->conn->connect_error){
            echo "Fail" . $this->conn->connect_error;
        }
        //echo "Connected successfully..!";
    }

    // PHP will automatically call this function at the end of the script
    public function __destruct(){
        $this->closeConnection();
    }
    //for mysqli closing connection
    protected function closeConnection(){
        if($this->conn != null){
            $this->conn->close();
            $this->conn = null;
        }
    }
}

