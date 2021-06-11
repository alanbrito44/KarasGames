    <!--Shopping Cart Section-->
        <section id="cart" class="py-3">
            <div class="container-fluid w-75">
                <h5 class="font-baskerville font-size-20">Shopping cart</h5>

                <!--Shopping Cart items-->
                <div class="row">
                    <div class="col-sm-9">
                        <!-- Carrito vacio -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-12 text-center py-2">
                                <img src="./assets/empty_cart.png" alt="empyCart" class="img-fluid" style="height: 200px;">
                                <p class="font-baskerville font-size-16 text-black-50">Carrito vacio</p>
                            </div>
                        </div>
                        <!-- Carrito vacio -->
                    </div>
                    <!--Sub total section-->
                    <div class="col-sm-3">
                        <div class="sub-total text-center mt-2 border">
                            <h6 class="font-size-12 font-baskerville text-success py-3"><i class="fas fa-check"></i>Tu orden esta lista para se procesada</h6>
                            <div class="border-top py-4">
                                <h5 class="font-baskerville font-size-20">Subtotal (<?php echo isset($subtotal) ? count($subtotal) : 0; ?> items):&nbsp; 
                                    <span class="text-danger">$ <span class="text-danger" id="deal-price"><?php echo isset($subtotal) ? $cart->getSum($subtotal) : 0 ?></span></span>
                                </h5>
                                <button type="submit" class="btn btn-warning mt-3">Proceder a comprar</button>
                            </div>
                        </div>
                    </div>
                    <!--Sub total section-->
                </div>
                <!--Shopping Cart items-->
            </div>
        </section>
    <!--Shopping Cart Section-->