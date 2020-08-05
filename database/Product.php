<?php
class Product
{
    public $db = null;
    public function __construct(DBController $db)  //pass dscontrooler obj into construct
    {
        if (!isset($db->conn)) return null;
        $this->db = $db;
    }

    //fetch product data using getData method
    public function getData($table = 'product')
    {
        $result = $this->db->conn->query("SELECT * FROM {$table}");
        $resultArray = array();
        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) { //puts all the results into an associative array that we can loop through. 
            $resultArray[] = $item;
            //echo "<br>" . "id: " . $item["user_id"] . "; First Name: " . $item["first_name"] . "; Last Name: " . $item["last_name"] . "<br>";
        }
        return $resultArray;
    }

    //get product using item_id
    public function getProduct($item_id = null, $table = 'product') 
    {
        if (isset($item_id)) {
            $result = $this->db->conn->query("SELECT * FROM {$table} WHERE item_id={$item_id}"); //only select the items that 'item_id' in 'cart' matches with those in 'product'
            $resultArray = array();
            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) { //puts all the results into an associative array that we can loop through. 
                $resultArray[] = $item;
            }
            return $resultArray; //an array of the item having item_id in cart = item_id in table
        }
    }
}
