    <?php
        $juego_id = $_GET['juego_id']??1;
        foreach($product->getData() as $item) :
            if($item['juego_id'] == $juego_id) :
    ?>
    <!--Products-->
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <img src="<?php echo $item['juego_imagen']??"./assets/catalogo/Simulacion/motogp.jpg"; ?>" alt="product" class="img-fluid">
                        <div class="row pt-4 font-size-16 font-baskerville">
                            <div class="col">
                                <button type="submit" class="bnt btn-danger form-control">Comprar YA</button>
                            </div>
                            <div class="col">
                                <form method="POST">
                                    <input type="hidden" name="juego_id" value="<?php echo $item['juego_id']??'1'; ?>">
                                    <input type="hidden" name="usuario_id" value="<?php echo 1; ?>">
                                    <?php 
                                        if(in_array($item['juego_id'], $cart->getCardId($product->getData('carrito')) ?? [])){
                                            echo '<button type="submit" disabled class="btn btn-success form-control">Agregar al carrito</button>';
                                        }else{
                                            echo '<button type="submit" name="top_sale_submit" class="btn btn-warning form-control">Agregar al carrito</button>';
                                        }
                                    ?>
                                </form>   
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-5">
                        <h5 class="font-inconsolata font-size-20"><?php echo $item['juego_nombre']??"Unknown" ?></h5>
                        <small><?php echo $item['juego_distribuidora']??"Unknown" ?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-baskerville font-size-14">20,458 rating | 1000+ preguntas contestadas</a>
                        </div>
                        <hr class="m-0">
                        <!--precio de producto-->
                        <table class="my-3">
                            <tr class="font-baskerville font-size-14">
                                <td>M.R.P.</td>
                                <td><strike>$70.00</strike></td>
                            </tr>
                            <tr class="font-baskerville font-size-14">
                                <td>Deal price</td>
                                <td class="font-size-20 text-danger">$ <span><?php echo $item['juego_precio']??"0" ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Incluye todos los impuestos</small></td>
                            </tr>
                            <tr class="font-baskerville font-size-14">
                                <td>You save</td>
                                <td><span class="font-size-16 text-danger">$25.00</span></td>
                            </tr>
                        </table>
                        <!--precio de producto-->
                        <!--policy-->
                        <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-baskerville font-size-12">10 dias<br>de Reemplazo</a>
                                </div>
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-baskerville font-size-12">Daily tuition <br> Deliverd</a>
                                </div>
                                <div class="return text-center me-5">
                                    <div class="font-size-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                    </div>
                                    <a href="#" class="font-baskerville font-size-12">1 year <br>Warnin</a>
                                </div>
                            </div>
                        </div>
                        <!--policy-->
                        <hr>
                        <!--Detalles de orden-->
                        <div id="order-details" class="font-baskerville d-flex flex-column text-dark">
                            <small>Delivery by: Mar 29 - Apr 1</small>
                            <small>Sold by: <a href="#">Alancito </a>(4.5 out of 5 | 18,454 rating)</small>
                            <small><i class="fas fa-map-marked-alt color-primary"></i>&nbsp;&nbsp;Deliver To Customer - 424201</small>
                        </div>
                        <!--Detalles de orden-->

                        <!--Cantidad de juegos-->
                        <div class="row">
                            <div class="col-12 mt-3">                              
                                <div class="qty d-flex">
                                    <h6 class="font-baskerville">Cantidad: </h6>
                                    <div class="px-4 d-flex font-roboto">
                                        <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                        <input type="text" data-id="pro1" class="qty-input border px-2 w-50 bg-light text-center" disabled value="1" placeholder="1">
                                        <button class="qty-down border bg-light" data-id="pro1"><i class="fas fa-angle-down"></i></button>
                                    </div>
                                </div>                               
                            </div>
                        </div>
                        <!--Cantidad de juegos-->

                        <!--Tipo de juego-->
                        <div class="size my-3">
                            <h6 class="font-baskerville">Tipo de juego</h6>
                            <div class="d-flex justify-content-between w-75">
                                <div class="font-roboto border p-2">
                                    <button class="btn p-0 font-size-14">Normal</button>
                                </div>
                                <div class="font-roboto border p-2">
                                    <button class="btn p-0 font-size-14">Deluxe Edition</button>
                                </div>
                                <div class="font-roboto border p-2">
                                    <button class="btn p-0 font-size-14">Speacial Edition</button>
                                </div>
                            </div>
                        </div>
                        <!--Tipo de juego-->
                    </div>
                    <!--Descrípcion de producto-->
                    <div class="col-12">
                        <h6 class="font-baskerville">Descripcion del juego</h6>
                        <hr>
                        <p class="font-inconsolata font-size-14"><?php echo $item['juego_descripcion']??"Unknown" ?></p>
                    </div>
                    <!--Descrípcion de producto-->
                </div>
            </div>
        </section>
    <!--Products-->
    <?php 
        endif;
        endforeach;
    ?>