<?php
if($_POST){
	//modificar juego
    if(isset($_POST["btnModificar"])){

        $id = $_REQUEST["txtId"];
        $nombre = $_REQUEST["txtNombreUsu"];
        $contrasena = $_REQUEST["txtContra"];
        $email = $_REQUEST["txtEmail"];
        $rol = $_REQUEST["txtRol"];
		
        if($_REQUEST["modificacion"]=="si"){
            $dash->modificarUsu($id,$nombre,$contrasena,$email);
            header("location:./dashboardUsu.php");
        }else{
            header("location:./dashboardUsu.php");
        }
			
    }
    //modificar juego

    //eliminar juego
    if(isset($_POST["btnEliminar"])){

		$id = $_REQUEST["txtId"];
		
		if($_REQUEST["eliminacion"]=="si"){
            $dash->eliminarUsu($id);
            header("location:./dashboardUsu.php");
        }else{
            header("location:./dashboardUsu.php");
        }	
    }
    //eliminar juego

}
?>

<script type="text/javascript">

	//modificar juego
	function cargarMo(id,nombre, contrasena, email, rol){
            document.getElementById("txtId").value=id;
            document.getElementById("txtNombreUsu").value=nombre;
            document.getElementById("txtContra").value=contrasena;
            document.getElementById("txtEmail").value=email;
            document.getElementById("txtRol").value=rol;
            
            $("#btnEliminar").hide();
            $("#btnModificar").show();
    }
        function confirmarMo(){
            if(confirm("¿Estas seguro de querer modificar el registro?")){
                document.getElementById("modificacion").value="si";
            }else{
                document.getElementById("modificacion").value="no";
            }
        }
        //modificar juego

        function cargarDel(id,nombre, contrasena, email, rol){
			document.getElementById("txtId").value=id;
            document.getElementById("txtNombreUsu").value=nombre;
            document.getElementById("txtContra").value=contrasena;
            document.getElementById("txtEmail").value=email;
            document.getElementById("txtRol").value=rol;
            
            
            $("#btnEliminar").show();
            $("#btnModificar").hide();
    }

    function confirmarDel(){
            if(confirm("¿Estas seguro de querer Eliminar el registro?")){
                document.getElementById("eliminacion").value="si";
            }else{
                document.getElementById("eliminacion").value="no";
            }
    }
        
</script>

<section>
	<div class="container-fluid">
		<?php
            echo $dash->tablaUsuarios();
        ?>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Categorias de juegos KARSAGAMES</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="dashboardUsu.php" method="post" enctype="multipart/form-data" id="formuarlio">

                <label class="label label-danger">ID Usuario</label><br>
                <input type="text" name="txtId" id="txtId" class="form-control" readonly="true" required><br>

                <label class="label label-danger">Nombre de usuario</label><br>
                <input type="text" name="txtNombreUsu" id="txtNombreUsu" class="form-control" required><br>

                <label class="label label-danger">Contrasena</label><br>
                <input type="text" name="txtContra" id="txtContra" class="form-control" required><br>	

                <label class="label label-danger">Email</label><br>
                <input type="text" name="txtEmail" id="txtEmail" class="form-control" required><br>	

                <label class="label label-danger">ROL</label><br>
                <input type="text" name="txtRol" id="txtRol" class="form-control" readonly="true" required><br>		

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" onclick="confirmarDel()" value="Eliminar" name="btnEliminar" id="btnEliminar" class="btn btn-danger">
                    <input type="submit" onclick="confirmarMo()" value="Modificar" name="btnModificar" id="btnModificar" class="btn btn-info">
                </div>

                <!--dos hiden para verificar si se va eliminar o modificar -->
                <input type="hidden" id="eliminacion" name="eliminacion" value="">
                <input type="hidden" id="modificacion" name="modificacion" value="">
            </form>
        </div>
        </div>
    </div>
</div>