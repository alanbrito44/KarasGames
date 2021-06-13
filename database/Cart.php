<?php

//php clase carrito
class Cart{

    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db = $db;
    }

    //insertando en tabla carrito
    public function insertIntoCart($param = null,$table = "carrito"){
        if($this->db->con != null){
            if($param != null){
                //insertando en carrito
                $columns = implode(',',array_keys($param));

                $values = implode(',',array_values($param));


                //creando query sql
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)",$table,$columns,$values);
                //ejecutando el query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    //obteniendo juego_id y usuario_id
    public function addToCart($usuario_id,$juego_id){
        $param = array(
            "usuario_id"=>$usuario_id,
            "juego_id"=>$juego_id
        );

        //insetando datos en carrito
        $result = $this->insertIntoCart($param);
        if($result){
            //recargando pagina
            header("Location:".$_SERVER['PHP_SELF']);
        }
    }

    //borrar juego del carrito con juego_id
    public function deleteCart($juego_id = null, $table = "carrito"){
        if($juego_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE juego_id = {$juego_id}");
            if($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //borrar juego del carrito con juego_id
    public function deleteWish($juego_id = null, $table = "wishlist"){
        if($juego_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE juego_id = {$juego_id}");
            if($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    //calculando el sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f',$sum);
        }
    }

    //obtener juego_id del carrito
    public function getCardId($cartArray = null, $key = "juego_id"){
        if ($cartArray != null){
            $cart_id = array_map(function($values) use ($key){
                return $values[$key];
            },$cartArray);
            return $cart_id;
        }
    }

    //salvar para despues
    public function saveForLater($juego_id = null, $saveTable  = "wishlist", $fromTable = "carrito"){
        if($juego_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE juego_id = {$juego_id};";
            $query .= "DELETE FROM {$fromTable} WHERE juego_id = {$juego_id};";
            //ejecutando multiples querys
            $result = $this->db->con->multi_query($query);
            if($result){
                header("Location:".$_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function buyGames($usuario_id = null, $information  = "carrito", $information2 = "productos"){
        if($usuario_id != null){
            $query = "INSERT INTO historial SELECT '',a.cart_id, a.usuario_id, b.juego_id, b.juego_distribuidora, b.juego_nombre, b.juego_precio, b.juego_imagen, b.categoria_id
            from {$information2} b INNER JOIN {$information} a ON a.juego_id = b.juego_id WHERE a.usuario_id = {$usuario_id};";
            $query .= "DELETE FROM carrito WHERE usuario_id = {$usuario_id};";
            //ejecutando multiples querys
            $result = $this->db->con->multi_query($query);
            if($result){
                echo "<script>alert('Compra realizada con exito');
                window.location.href='./index.php';</script>";
                //header("Location:".$_SERVER['PHP_SELF']);
            }else{
                echo "<script>alert('CARRITO VACIO');
                window.location.href='./index.php';</script>";
            }
            return $result;
        }
    }

    public function idUsuarioCar($usuario_id){
        $query = "SELECT a.usuario_id from carrito a INNER JOIN productos b ON a.juego_id = b.juego_id WHERE a.usuario_id = {$usuario_id};";
        $result = $this->db->con->query($query);
        while ($fila = mysqli_fetch_assoc($result)){
            $id = $fila["usuario_id"];
        }
        return $id;
    }
}

?>