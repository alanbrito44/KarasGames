<?php

if($_POST){
    $usua =$_POST["txtNombre"];
    $pass = $_POST["txtContrasena"];
    $email = $_POST["txtEmail"];
    $registro = $usur->insertar($usua, $pass,$email);

    if(!isset($_COOKIE["bloqueado".$usua])){
        if($registro != ""){
            echo "<script>alert('Registro con exito');
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

if(!isset($_SESSION["user"])){
	$rol = 'Unknown';
}else{
	$rol = $_SESSION["rol"];
}

if($rol == "CLIENTE"){
	header("Location:./index	.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <!--Custom CSS File-->
    <link rel="stylesheet" href="LoginStyle.css">
</head>
<body>
	<?php if(($rol) == 'ADMINISTRADOR') :?>
		<?php
			include('Template/_navbard-dash.php');
		?>
	<?php endif?>
	<!--Formulario-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 form-container">
				<div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
					<div class="logo mt-5 mb-3">
						<img src="./assets/registro.png" width="300px">
					</div>
					<div class="heading mb-3">
						<h4>Crea tu cuenta</h4>
					</div>
					<form action="register.php" method="POST">
						<div class="form-input">
							<span><i class="fa fa-user"></i></span>
							<input type="text" placeholder="Nombre de cliente" id="txtNombre" name="txtNombre" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-envelope"></i></span>
							<input type="text" placeholder="Contrsena" id="txtContrasena" name="txtContrasena" required>
						</div>
						<div class="form-input">
							<span><i class="fa fa-lock"></i></span>
							<input type="email" placeholder="Email" id="txtEmail" name="txtEmail" required>
						</div>
						<div class="row mb-3">
							<div class="col-12 d-flex">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="cb1">
									<label class="custom-control-label text-white" for="cb1">Acepto los terminos del servicio</label>
								</div>
							</div>
						</div>
						<div class="text-left mb-3">
							<button type="submit" class="btn" name="btnGuardar" id="btnGuardar">Registrarse</button>
							<?php if(($rol) != 'ADMINISTRADOR') :?>
								<a class="ms-3 btn btn-danger" href="./login.php" class="btn btn-danger">Loguear</a>
							<?php endif?>
						</div>
					</form>
					<p>SI YA TIENES UNA CUENTA LOGUEATE</p>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
		</div>
	</div>
	<!--Formulario-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>