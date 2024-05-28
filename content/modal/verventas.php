<?php
    $cedulaVendedor = $row['cedula'];

    // CONSULTA PRA VISUALIZAR TODOS LOS NUMEROS DEL VENDEDOR (RIFA MOTO)
    $sqlVerVentas = "SELECT COUNT(*) numero FROM registro_moto_numero WHERE vendedor = '$cedulaVendedor'";
    $resultadoVerVentaMoto = $mysqli->query($sqlVerVentas);
    $rowMoto = mysqli_fetch_assoc($resultadoVerVentaMoto);
    $montoRifaMoto = $rowMoto['numero'];

    // CONSULTA PARA VISUALIZAR TODOS LOS NUMEROS DEL VENDEDOR (RIFA DOBLE OPORTUNIDAD)
    $sqlVerVentasDobleOportunidad = "SELECT COUNT(*) numero FROM registro_numero_doble_oportunidad WHERE vendedor ='$cedulaVendedor'";
    $resultadoVerVentaDobleOportunidad = $mysqli->query($sqlVerVentasDobleOportunidad);
    $rowDobleOportunidad = mysqli_fetch_assoc($resultadoVerVentaDobleOportunidad);
    $montoDobleOportunidad = $rowDobleOportunidad['numero'];

    // CONSULTA PARA VISUALIZAR TODOS LOS NUMEROS DEL VENDEDOR (RIFA MILLONARIA)
    $sqlVerVentasDobleOportunidad = "SELECT COUNT(*) vendedor FROM registro_numero_millonaria WHERE vendedor ='$cedulaVendedor'";
    $resultadoVerVentaDobleOportunidad = $mysqli->query($sqlVerVentasDobleOportunidad);
    $rowDobleOportunidad = mysqli_fetch_assoc($resultadoVerVentaDobleOportunidad);
    $VentasDeVendedor = $rowDobleOportunidad['vendedor'];

    // CONSULTA PARA VISUALIZAR TODOS LOS NUMEROS DEL VENDEDOR (RIFA DOBLE OPORTUNIDAD)
    $sqlVerVentasDobleOportunidad = "SELECT COUNT(*) numero FROM registro_numero_triple_500 WHERE vendedor ='$cedulaVendedor'";
    $resultadoVerVentaDobleOportunidad = $mysqli->query($sqlVerVentasDobleOportunidad);
    $rowDobleOportunidad = mysqli_fetch_assoc($resultadoVerVentaDobleOportunidad);
    $montoTriple500= $rowDobleOportunidad['numero'];
?>
<!-- Modal -->
<div class="modal fade" id="VerVentas<?php echo $row['cedula'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ventas del <?php echo $row['nombre'];?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="fs-5">RIFA DE MOTO</h4>
                <p>Numeros Vendios: <?php 
                                if ($montoRifaMoto == 0) {
                                    echo "No han ventas.";
                                }else {
                                    
                                    echo $montoRifaMoto;
                                }
                            ?>
                </p>
                <p>Monto: <?php
                        $MontoTotalMoto = $montoRifaMoto * 2;
                        echo $MontoTotalMoto;
                    ?>
                </p>
                <hr>
                <h4 class="fs-5">RIFA DE DOBLE OPORTUNIDAD</h4>
                <p>Numeros Vendidos: <?php 
                                    if ($montoDobleOportunidad == 0) {
                                        echo "No hay Ventas";
                                    }else {
                                        
                                        echo $montoDobleOportunidad;
                                    }
                                ?></p>
                <p>Monto: <?php
                    $MontoTotalDobleOportunidad = $montoDobleOportunidad * 2;
                    echo $MontoTotalDobleOportunidad
        ?></p>
                <hr>
                <h4 class="fs-5">RIFA MILLONARIA</h4>
                <P>Cantidad de ventas: <?php
                                    if ($VentasDeVendedor == 0) {
                                      echo "No hay ventas.";
                                  }else {
                                      
                                      echo $VentasDeVendedor;
                                  }
                                  ?>
                </P>
                <hr>
                <h4 class="fs-5">RIFA Triple 500</h4>
                <P>Numeros Vendidos: <?php 
                
                                  if ($montoTriple500 == 0) {
                                    echo "No hay ventas.";
                                }else {
                                    
                                    echo $montoTriple500;
                                }
                                ?>
                </P>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-success">Generar Reporte</button> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>