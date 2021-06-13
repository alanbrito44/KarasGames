<?php
if($_POST){
    //insetar juego
    if(isset($_POST["btnGuardar"])){

		$nombre = $_REQUEST["txtNombreCat"];
        $descripcion = $_REQUEST["txtDescripCat"];
		
		$dash->insertarCat($nombre,$descripcion);
    }
    //insetar juego

	//modificar juego
    if(isset($_POST["btnModificar"])){

        $id = $_REQUEST["txtId"];
        $nombre = $_REQUEST["txtNombreCat"];
        $descripcion = $_REQUEST["txtDescripCat"];
		
        if($_REQUEST["modificacion"]=="si"){
            $dash->modificarCat($id,$nombre,$descripcion);
            header("location:./dashboardCat.php");
        }else{
            header("location:./dashboardCat.php");
        }
			
    }
    //modificar juego

    //eliminar juego
    if(isset($_POST["btnEliminar"])){

		$codigo = $_REQUEST["txtCodigo"];
		
		if($_REQUEST["eliminacion"]=="si"){
            $dash->eliminar($codigo);
            header("location:./dashboardCat.php");
        }else{
            header("location:./dashboardCat.php");
        }	
    }
    //eliminar juego

}
?>

<script type="text/javascript">

	//modificar juego
	function cargarMo(id,nombre, descripcion){
            document.getElementById("txtId").value=id;
            document.getElementById("txtNombreCat").value=nombre;
            document.getElementById("txtDescripCat").value=descripcion;
            
            $("#btnEliminar").hide();
            $("#btnModificar").show();
            $("#btnGuardar").hide();
    }
        function confirmarMo(){
            if(confirm("¿Estas seguro de querer modificar el registro?")){
                document.getElementById("modificacion").value="si";
            }else{
                document.getElementById("modificacion").value="no";
            }
        }
        //modificar juego

        function cargarDel(distribuidora, titulo, precio, imagen, fecha, catagegoria, descripcion,codigo){
			catagegoria--;
            document.getElementById("txtDistribuidora").value=distribuidora;
            document.getElementById("txtTitulo").value=titulo;
            document.getElementById("txtPrecio").value=precio;
            document.getElementById("FileImagen").selectedIndex=imagen;
			document.getElementById("txtFecha").value=fecha;
            document.getElementById("cmbCodCat").selectedIndex=catagegoria;
            document.getElementById("txtDescripcion").value=descripcion;
			document.getElementById("txtCodigo").value=codigo;
            
            $("#btnEliminar").show();
            $("#btnModificar").hide();
            $("#btnGuardar").hide();
    }

    function confirmarDel(){
            if(confirm("¿Estas seguro de querer Eliminar el registro?")){
                document.getElementById("eliminacion").value="si";
            }else{
                document.getElementById("eliminacion").value="no";
            }
        }

        //nuevo juego
        $(document).ready(function(){
            $("#btnNuevo").on("click", function(){
                $('input[type="text"]').val('');
                $("#btnEliminar").hide();
                $("#btnModificar").hide();
                $("#btnGuardar").show();
            });
        });
        //nuevo juego
        

</script>



<button type="button" id="btnNuevo" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Nueva categoria
</button>

<br>

<section>
	<div class="container-fluid">
		<?php
            echo $dash->tablaCategirias();
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
            <form action="dashboardCat.php" method="post" enctype="multipart/form-data" id="formuarlio">

                <label class="label label-danger">ID Categoria</label><br>
                <input type="text" name="txtId" id="txtId" class="form-control" readonly="true" required><br>

                <label class="label label-danger">Nombre de Categoria</label><br>
                <input type="text" name="txtNombreCat" id="txtNombreCat" class="form-control" required><br>

                <label class="label label-danger">Descripcion de categoria</label><br>
                <input type="text" name="txtDescripCat" id="txtDescripCat" class="form-control" required><br>				

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" value="Guardar" name="btnGuardar" id="btnGuardar" class="btn btn-success">
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