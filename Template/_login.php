<?php

if($_POST){
    $usua =$_POST["txtUsua"];
    $pass = $_POST["txtPass"];
    $rol = $usur->autenticar($usua, $pass);
	$usuarioId = $usur->idUsuario($usua);
	$usuarioIdCarrito = $cart->idUsuarioCar($usuarioId);

    if(!isset($_COOKIE["bloqueado".$usua])){
        if($rol != ""){
            $_SESSION["user"] = $usua;
            $_SESSION["rol"] = $rol;
			$_SESSION["id"] = $usuarioId;
			$_SESSION["carritoId"] = $usuarioIdCarrito;
            echo "<script>alert('Inicio de sesion con $usua,$rol,$usuarioId,$usuarioIdCarrito exito');
                window.location.href='index.php';</script>";
        }else{
            if(isset($_COOKIE[$usua])){
                $contador= $_COOKIE[$usua];
                $contador++;
                setcookie($usua,$contador,time()+60*60);
                if($contador > 3){
                    setcookie("bloqueado".$usua ,0,time()+ 60);
                }
            }else{
                setcookie($usua,1, time()+ 60*60);
            }
        }
    }else{
        echo "<script>alert('El usuario $usua esta bloqueado por 1 minuto')</script>";
    }
}

if(isset($_REQUEST["cerrar"])){
	session_destroy();
	header("Location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Banco azul | inicio de sesion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../CSS/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!--Custom CSS File-->
    <link rel="stylesheet" href="LoginStyle.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mt-5 mb-3">
						<img src="./assets/empty_cart.png" width="150px">
					</div>
					<div class="heading mb-3">
						<h4>Inicia sesion con tu cuenta</h4>
					</div>
					<form method="post">
						<div class="form-input">
							<span><i class="fa fa-user-circle-o"></i></span>
							<input type="text" placeholder="Usuario" name="txtUsua" id="txtUsua" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="password" placeholder="Contraseña" name="txtPass" id="txtPass" required>
						</div>
						<div class="row mb-3">
							<div class="col-6 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">Recordar</label>
								</div>
							</div>
						</div>
						<div class="text-left mb-3">
							<button type="submit" class="btn" name="btnLogin">INICIAR SESION</button>
							<a class="ms-3 btn btn-danger" href="./register.php" class="btn btn-danger">registrarse</a>
						</div>
					</form>
					<p>SI NO TIENES UNA CUENTA CON NOSOTROS REGISTRATE</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
</body>
</html>