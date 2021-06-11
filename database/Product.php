<?php
//Use to fetcg product data
class Product{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //fetch product data using getData Method
    public function getData($table = 'productos'){
       $result = $this->db->con->query("SELECT * FROM {$table}");

       $resultArray = array();

       while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
           $resultArray[] = $item;
       }
       return $resultArray;
    }

    public function getCat($table = 'categorias'){
        $result = $this->db->con->query("SELECT * FROM {$table}");
 
        $resultArray = array();
 
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
     }

     //ger Product using item id
     public function getProduct($juego_id = null, $table = 'productos'){
         if (isset($juego_id)){
             $result = $this->db->con->query("SELECT * FROM {$table} WHERE juego_id = {$juego_id}");
             $resultArray = array();
 
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
         }
     }

}

?>