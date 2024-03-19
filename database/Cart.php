
<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    public function getCartId($cartArray = null, $key = "item_id") {
        if (is_array($cartArray)) { // Check if $cartArray is an array
            $cart_id = array_map(function ($value) use ($key) {
                if (is_array($value) && isset($value[$key])) { // Check if $value is an array and if the key exists
                    return $value[$key];
                } else {
                    return null; // Return null if key doesn't exist or $value is not an array
                }
            }, $cartArray);
            return $cart_id;
        } else {
            return array(); // Return an empty array if $cartArray is not an array
        }
    }
    
    
    
    public function getCartItemsByUserId($userId)
    {
        if ($this->db->con != null) {
            $result = $this->db->con->query("SELECT * FROM cart WHERE user_id = $userId");
            $cartItems = array();
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cartItems[] = $row;
                }
            }
            return $cartItems;
        }
        return null;
    }
}
    

