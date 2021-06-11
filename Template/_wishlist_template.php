    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['delete_cart_submit'])){
                $deleteRecord = $cart->deleteWish($_POST['juego_id']);
            }

            if(isset($_POST['cart-submit'])){
                $cart->saveForLater($_POST['juego_id'],'carrito','wishlist');
            }
        }
    ?>
    <!--Shopping Cart Section-->
        <section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baskerville font-size-20">Lista de deseados</h5>

                <!--Shopping Cart items-->
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            foreach($product->getData('wishlist') as $item) :
                                $Cart = $product->getProduct($item['juego_id']);
                                $subtotal[] = array_map(function($item){
                        ?>
                        <!--Cart item--> 
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['juego_imagen']??"./assets/catalogo/Simulacion/motogp.jpg"; ?>" style="height: 120px;" alt="cart1" class="img-fluid rounded">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-roboto font-size-20"><?php echo $item['juego_nombre']??"Unknown"; ?></h5>
                                <small><?php echo $item['juego_distribuidora']??"Unknown"; ?></small>
                                <!--Product Rating-->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <a href="#" class="px-2 font-baskerville font-size-14">20,534 rating</a>
                                </div>
                                <!--Product Rating-->

                                <!--Product qty-->
                                <div class="qty d-flex pt-2">
                                    
                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['juego_id'] ?? 0; ?>" name="juego_id">
                                        <button type="submit" name="delete_cart_submit" class="font-baskerville btn text-danger pl-0 pr-3 border-right">Delete</button>
                                    </form>

                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['juego_id'] ?? 0; ?>" name="juego_id">
                                        <button type="submit" name="cart-submit" class="font-baskerville btn text-danger">Agregar al carrito</button>
                                    </form>
                                    
                                </div>
                                <!--Product qty-->
                            </div>

                            <div class="col-sm-2 text-end">
                                <div class="font-size-20 text-danger font-baskerville">
                                    $ <span class="product_price" data-id="<?php echo $item['juego_id'] ?? 0 ?>" ><?php echo $item['juego_precio']??"0"; ?></span>
                                </div>
                            </div>
                        </div>
                        <!--Cart item--> 
                        <?php
                            return $item['juego_precio'];
                            },$Cart);//cerrando array function                           
                            endforeach;                         
                        ?>
                    </div>
                </div>
                <!--Shopping Cart items-->
            </div>
        </section>
    <!--Shopping Cart Section-->