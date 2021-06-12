<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karsa Games</title>

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!--Owl Carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Custom CSS File-->
    <link rel="stylesheet" href="style.css">

    <?php
        //require function on php
        require('functions.php');
    ?>

</head>
<body>

    <!--start #header-->
    <header id="header">
        <div class="strip d-flex justify-content-between px-4 bg-light">
            <p class="font-baskerville font-size-12 text-black-50 m-0">pagina creada por el grupo mera verga en salga</p>
        </div>

        <!--navbar principal-->
        <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Karsa Games</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto font-inconsolata">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categories.php">Categorias</a>
                        </li>
                        <?php if(($rol = $_SESSION["rol"] ) == 'ADMINISTRADOR') :?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Dashboard</a>
                        </li>
                        <?php endif?>
                    </ul>
                    <form action="" class="font-size-14 font-baskerville">
                        <a href="cart.php" class="py-2 rounded-pill color-primary-bg btn">
                            <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                            <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('carrito')); ?></span>
                        </a>
                        <a href="cart.php" class="px-3 btn btn-dark">Wishlist <?php echo count($product->getData('wishlist')); ?></a>
                        <?php if(!isset($_SESSION["user"])) :?>
                        <a href="login.php" class="px-3 btn btn-dark">Login</a>
                        <?php endif?>
                        <?php if(isset($_SESSION["user"])) :?>
                        <a class="px-3 btn btn-danger" href="login.php?cerrar=true" class="btn btn-danger">Close sesion</a>
                        <?php echo $usua = $_SESSION["user"]; ?>
                        <?php endif?>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <!--start #header-->

    <!--start #main-site-->
    <main id="main-site">