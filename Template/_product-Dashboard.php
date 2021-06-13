<?php
if($_POST){
    //insetar juego
    if(isset($_POST["btnGuardar"])){

        //subir imagen a la base de datos
        $nombreimg = $_FILES["FileImagen"]["name"];
        $archivo = $_FILES["FileImagen"]["tmp_name"];
        $ruta = "./assets/catalogo";
        $ruta = $ruta."/".$nombreimg;
        move_uploaded_file($archivo,$ruta);
        //subir imagen a la base de datos

		$distribuidora = $_REQUEST["txtDistribuidora"];
        $titulo = $_REQUEST["txtTitulo"];
        $precio = $_REQUEST["txtPrecio"];
        $ruta;//se pone la ruta del archivo subido
		$fecha = $_REQUEST["txtFecha"];
        $categoria = $_REQUEST["cmbCodCat"];
		$descripcion = $_REQUEST["txtDescripcion"];
		$codigo = $_REQUEST["txtCodigo"];
		
		$dash->insertar($distribuidora,$titulo,$precio,$ruta,$fecha,$categoria,$descripcion,$codigo);
    }
    //insetar juego

	//modificar juego
    if(isset($_POST["btnModificar"])){

        //subir imagen a la base de datos
        $nombreimg = $_FILES["FileImagen"]["name"];
        $archivo = $_FILES["FileImagen"]["tmp_name"];
        $ruta = "./assets/catalogo";
        $ruta = $ruta."/".$nombreimg;
        move_uploaded_file($archivo,$ruta);
        //subir imagen a la base de datos

        $id = $_REQUEST["txtId"];
		$distribuidora = $_REQUEST["txtDistribuidora"];
        $titulo = $_REQUEST["txtTitulo"];
        $precio = $_REQUEST["txtPrecio"];
        $ruta;//se pone la ruta del archivo subido
		$fecha = $_REQUEST["txtFecha"];
        $categoria = $_REQUEST["cmbCodCat"];
		$descripcion = $_REQUEST["txtDescripcion"];
		$codigo = $_REQUEST["txtCodigo"];
		
		if($_REQUEST["modificacion"]=="si"){
            $dash->modificar($id,$distribuidora,$titulo,$precio,$ruta,$fecha,$categoria,$descripcion,$codigo);
            header("location:./dashboardPro.php");
        }else{
            header("location:./dashboardPro.php");
        }	
    }
    //modificar juego

    //eliminar juego
    if(isset($_POST["btnEliminar"])){

		$id = $_REQUEST["txtId"];
        $codigo = $_REQUEST["txtCodigo"];
		
		if($_REQUEST["eliminacion"]=="si"){
            $dash->eliminar($id);
            header("location:./dashboardPro.php");
        }else{
            header("location:./dashboardPro.php");
        }	
    }
    //eliminar juego

}
?>
<script type="text/javascript">

	//modificar juego
	function cargarMo(id,distribuidora, titulo, precio, imagen, fecha, catagegoria, descripcion,codigo){
			catagegoria--;
            document.getElementById("txtId").value=id;
            document.getElementById("txtDistribuidora").value=distribuidora;
            document.getElementById("txtTitulo").value=titulo;
            document.getElementById("txtPrecio").value=precio;
            document.getElementById("FileImagen").selectedIndex=imagen;
			document.getElementById("txtFecha").value=fecha;
            document.getElementById("cmbCodCat").selectedIndex=catagegoria;
            document.getElementById("txtDescripcion").value=descripcion;
			document.getElementById("txtCodigo").value=codigo;
            
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

        function cargarDel(id,distribuidora, titulo, precio, imagen, fecha, catagegoria, descripcion,codigo){
			catagegoria--;
            document.getElementById("txtId").value=id;
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
    Nuevo juego
</button>

<br>

<section>
	<div class="container-fluid">
		<?php
            echo $dash->tablaProducto();
        ?>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Juegos disponibles en KARSAGAMES</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="dashboardPro.php" method="post" enctype="multipart/form-data" id="formuarlio">

                <label class="label label-danger">ID Juego</label><br>
                <input type="text" name="txtId" id="txtId" class="form-control" readonly="true" required><br>

                <label class="label label-danger">Codigo juego</label><br>
                <input type="text" name="txtCodigo" id="txtCodigo" class="form-control" required><br>

                <label class="label label-danger">Distribuidora</label><br>
                <input type="text" name="txtDistribuidora" id="txtDistribuidora" class="form-control" required><br>

                <label class="label label-danger">Titulo</label><br>
                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required><br>

                <label class="label label-danger">Precio</label><br>
                <input type="text" name="txtPrecio" id="txtPrecio" class="form-control" required><br>

                <label class="label label-danger">Imagen</label><br>
                <input type="file" name="FileImagen" id="FileImagen"><br><br>

				<label class="label label-danger">Fecha de transaccion</label><br>
				<input class="form-control" type="date" id="txtFecha" name="txtFecha">

                <label class="label label-danger">Categoria</label><br>
                <select name="cmbCodCat" id="cmbCodCat" class="form-control">
                    <?php
                        $data = $dash->getComboCategorias();
                        foreach ($data as $indice=>$valor){
                            echo ' <option value="'. $indice. '">'. $valor . ' </option>';
                        }
                    ?>
                </select>

				<label class="label label-danger">Descripcion</label><br>
                <textarea name="txtDescripcion" id="txtDescripcion" class="form-control" required></textarea>

				

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
