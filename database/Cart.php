<?php

//class cart
class Cart
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->conn)) return null;
        $this->db = $db;
    }

    //insert to cart table 
    public function insertIntoCart($params = null, $table = "cart")
    { //params is an array contain the columns and rows (keys and values) in cart
        if ($this->db->conn != null) {
            if ($params != null) {
                //"insert into cart(user_id) value(0)"
                //get table columns
                $column = implode(',', array_keys($params)); //cart_id, user_id, item_id
                // print_r($column);
                $values = implode(',', array_values($params));
                // print_r($values);

                //create sql query INSERT INTO cart(user_id,item_id) VALUES(1,2)
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $column, $values);
                // echo $query_string;

                //execute query
                $result = $this->db->conn->query($query_string);
                return $result;
            }
        }
    }

    //get user_id and item_id and insert into cart table 
    public function addToCart($userId, $itemId)
    {
        //opt put userId and itemId from table cart
        if (isset($userId) && isset($itemId)) {
            $params = array(
                "user_id" => $userId, //keys => values
                "item_id" => $itemId  
            );

            //insert into cart
            $result = $this->insertIntoCart($params);
            if ($result) {
                //reload page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->conn->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
  

    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f',$sum);
        }   
        
    }

    //get item_id shopping cart list
    public function getCartId($cartArray = null, $key ="item_id"){
        if($cartArray != null){
            $cart_id = array_map(function($value) use($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }    
    } 

    // Save for later
    public function saveForLater($item_id=null, $saveTable="wishlist", $fromTable="cart")
    {
        //opt put userId and itemId from table cart
        if($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT*FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};"; 

            $result = $this->db->conn->multi_query($query);
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }
    
}
