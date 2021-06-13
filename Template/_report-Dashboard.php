
    <script>
        $(document).ready(function(){
            //cargando el combo del formulario
            var parametro = {"getCombo": true};
            $.ajax({
                url:'./database/comboReport.php',
                type:'post',
                data: parametro
            }).done(function(resp){
                console.log(resp);
                $("#comboCategorias").append(resp);
            }).fail(function(){
                console.log("ha ocurrido un error");
            });
        });
    </script>

<h4>Reporte parametrizado</h4><hr>
    <div class="container text-center">
        <div class="row">
            <div class="col-12">
                <form action="dashboardRep.php" method="post" class="form-control form-control-">
                    <label class="label">Seleccione el reporte</label>
                    <select id="comboCategorias" name="comboCategorias" class="form-control">
                    </select>
                    <br>
                    <input type="submit" value="Generar Reporte" class="btn btn-primary">
                </form>
                <br><br>
                <?php
                if($_POST){
                    $parametro = $_POST["comboCategorias"];
                    if ($_POST["comboCategorias"]==1){
                        $nombre_reporte = "Reporte de productos de existencia minima.pdf";
                        $rep->reporte1($nombre_reporte);
                    }
                    else if ($_POST["comboCategorias"]==2){
                        $nombre_reporte = "Reportes de Top 10 de productos mas vendidos.pdf";
                        $re->reporte2($nombre_reporte);
                    }
                    else if ($_POST["comboCategorias"]==3){
                        $nombre_reporte = "Reporte de Top 5 de productos menos vendidos.pdf";
                        $re->reporte3($nombre_reporte);
                    }
                    else if ($_POST["comboCategorias"]==4){
                        $nombre_reporte = "Reporte de productos del proveedor Exotic Liquids.pdf";
                        $re->reporte4($nombre_reporte);
                    }
                    else if ($_POST["comboCategorias"]==5){
                        $nombre_reporte = "Reporte los productos mas caros y los menos vendidos.pdf";
                        $re->reporte5($nombre_reporte);
                    }
                    else{

                    }
                }
                ?>
            </div>
        </div>
        
    </div>
    <div class="text-center">
        <iframe src="<?= $nombre_reporte ?>" style="width: 80%; height: 800px;" scrolling="yes">

        </iframe>
    </div>