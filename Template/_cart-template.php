    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['delete_cart_submit'])){
                $deleteRecord = $cart->deleteCart($_POST['juego_id']);
            }

            //salvar para despues
            if(isset($_POST['wishlist-submit'])){
                $cart->saveForLater($_POST['juego_id']);
            }
            
            //realizando compra de juegos
            if(isset($_POST['buy-submit'])){
                $cart->buyGames($_POST['juego_id']);
            }
        }
    ?>
    <!--Shopping Cart Section-->
        <section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baskerville font-size-20">Shopping cart</h5>

                <!--Shopping Cart items-->
                <div class="row">
                    <div class="col-sm-9">
                        <?php
                            foreach($product->getData('carrito') as $item) :
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
                                    <div class="d-flex font-baskerville w-50">
                                        <button class="qty-up border bg-light" data-id="<?php echo $item['juego_id'] ?? 0 ?>"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="<?php echo $item['juego_id'] ?? 0 ?>" class="qty-input border px-2 w-75 bg-light text-center" disabled value="1" placeholder="1">
                                        <button class="qty-down border bg-light" data-id="<?php echo $item['juego_id'] ?? 0 ?>"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['juego_id'] ?? 0; ?>" name="juego_id">
                                        <button type="submit" name="delete_cart_submit" class="font-baskerville btn text-danger px-3 border-right">Delete</button>
                                    </form>

                                    <form method="POST">
                                        <input type="hidden" value="<?php echo $item['juego_id'] ?? 0; ?>" name="juego_id">
                                        <button type="submit" name="wishlist-submit" class="font-baskerville btn text-danger">Save for later</button>
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
                    <!--Sub total section-->
                    <div class="col-sm-3">
                        <div class="sub-total text-center mt-2 border">
                            <h6 class="font-size-12 font-baskerville text-success py-3"><i class="fas fa-check"></i>Tu orden esta lista para se procesada</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baskerville font-size-20">Subtotal (<?php echo isset($subtotal) ? count($subtotal) : 0; ?> items):&nbsp; 
                                    <span class="text-danger">$ <span class="text-danger" id="deal-price"><?php echo isset($subtotal) ? $cart->getSum($subtotal) : 0 ?></span></span>
                                </h5>
                                <form method="POST">
                                    <input type="hidden" value="<?php echo $item['juego_id'] ?? 0; ?>" name="juego_id">
                                    <button type="submit" class="btn btn-warning mt-3" name="buy-submit">Proceder a comprar</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                    <!--Sub total section-->
                </div>
                <!--Shopping Cart items-->
            </div>
        </section>
    <!--Shopping Cart Section-->