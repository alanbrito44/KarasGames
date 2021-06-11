<?php 
    shuffle($product_shuffle);

    //request metodo post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['new_games_submit'])){
            //llamando metodo addToCart
            $cart->addToCart($_POST['usuario_id'],$_POST['juego_id']);
        }    
    }
?>
<!--New Games-->
    <section id="new-games"> 
        <div class="container">
            <h4 class="font-baskerville font-size-20">Nuevos Juegos</h4>
            <hr>
            <!--Owl carousel-->
            <div class="row row-cols-2 row-cols-md-4 g-4 text-white text-center mb-4">
                <div class="owl-carousel owl-theme">                 
                    <?php foreach($product_shuffle as $item) {?>                
                    <div class="item py-2 bg-dark">
                        <div class="product">
                            <div class="col" id="<?php echo $item['categoria_id']??"Unknown"; ?>">
                                <div class="card h-100 bg-dark">
                                <a href="<?php printf('%s?juego_id=%s','product.php',$item['juego_id']) ?>"><img src="<?php echo $item['juego_imagen']??"./assets/catalogo/Simulacion/motogp.jp"; ?>" class="card-img-top img-fluid rounded" alt="..."></a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $item['juego_nombre']??"Unknown"; ?></h5>
                                        <p class="card-text"><?php echo $item['juego_distribuidora']??"Unknown"; ?></p>
                                        <div class="rating text-warning font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                        <div class="price py-2">
                                            <span><?php echo $item['juego_precio']??'0'; ?></span>
                                        </div>
                                    </div>
                                    <form method="POST">
                                        <input type="hidden" name="juego_id" value="<?php echo $item['juego_id']??'1'; ?>">
                                        <input type="hidden" name="usuario_id" value="<?php echo $usuarioId = $_SESSION["id"]; ?>">
                                        <?php 
                                            if(in_array($item['juego_id'], $cart->getCardId($product->getData('carrito')) ?? [])){
                                                echo '<button type="submit" disabled class="btn btn-success">Comprar ahora</button>';
                                            }else{
                                                echo '<button type="submit" name="new_games_submit" class="btn btn-primary">Comprar ahora</button>';
                                            }
                                        ?>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } //cerrando la funcion foreach?>                 
                </div>
            </div>
            <!--Owl carousel-->
        </div>
    </section>
<!--New Games-->