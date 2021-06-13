<?php 
    //fetch de categorias
    $categoria_shuffle = $product->getCat();
    $brand = array_map(function($pro){return $pro['categoria_nombre'];},$categoria_shuffle);
    $brand2 = array_map(function($pro2){return $pro2['categoria_id'];},$product_shuffle);
    $unique = array_unique($brand);
    $unique2 = array_unique($brand2);
    sort($unique);
    sort($unique2);
    shuffle($product_shuffle);

    //request metodo post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['special_price_submit'])){
            //llamando metodo addToCart
            $cart->addToCart($_POST['usuario_id'],$_POST['juego_id']);
        }    
    }

    $in_cart = $cart->getCardId($product->getData('carrito'));
?>
<!--Special price-->
    <section id="special-price"> 
        <div class="container">
            <h4 class="font-baskerville font-size-20 mt-5">Categoria de juegos</h4>
            <hr>
            <div id="filters" class="button-group text-end font-baskerville font-size-16">
                <button class="btn btn-danger is-checked" data-filter="">Todos los juegos</button>
                <?php 
                    array_map(function($brand,$brand2){
                        printf('<button class="btn btn-dark" data-filter=".%s">%s</button>&nbsp;',$brand2,$brand);
                    },$unique,$unique2);
                ?>
            </div>

            <div class="grid">
                <?php array_map(function($item) use ($in_cart){?>  
                <div class="row row-cols-2 row-cols-lg-4 row-cols-md-3 g-4 text-white text-center mt-1">
                    <div class="grid-item <?php echo $item['categoria_id']??"Categoria"; ?>">             
                        <div class="item py-2">
                            <div class="product">
                                <div class="col" id="">
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
                                                if(in_array($item['juego_id'], $in_cart ?? [])){
                                                    echo '<button type="submit" disabled class="btn btn-success">Comprar ahora</button>';
                                                }else{
                                                    echo '<button type="submit" name="special_price_submit" class="btn btn-primary">Comprar ahora</button>';
                                                }
                                            ?>  
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>         
                    </div>
                </div>
                <?php },$product_shuffle) ?>             
            </div>
        </div>
    </section>
<!--Special price-->