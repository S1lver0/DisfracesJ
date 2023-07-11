















<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $row['Id_Cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar Cliente</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="EditarRegistro.php?id=<?php echo $row['Id_Cliente']; ?>">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $row['Nombre_Cliente']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Apellido:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Apellido_Cliente" value="<?php echo $row['Apellido_Cliente']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">DNI:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Dni_Cliente" value="<?php echo $row['Dni_Cliente']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Domicilio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Domicilio_Cliente" value="<?php echo $row['Domicilio_Cliente']; ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Celular:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Celular_Cliente" value="<?php echo $row['Celular_Cliente']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['Id_Cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Borrar Cliente</h4></center>
            </div>
            <div class="modal-body">    
                <p class="text-center">¿Estás seguro de borrar el registro?</p>
                <h2 class="text-center"><?php echo $row['Nombre_Cliente'].' '.$row['Apellido_Cliente']; ?></h2>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="BorrarRegistro.php?id=<?php echo $row['Id_Cliente']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Sí</a>
            </div>
        </div>
    </div>
</div>




<!-- Ventana Mostrar Datos -->
<div class="modal fade" id="detalles_<?php echo $row['Id_Cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Datos del Cliente</h4></center>
            </div>

            <div class="modal-body">
                <div class="container-fluid">
                    <form>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $row['Nombre_Cliente']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Apellido:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Apellido_Cliente" value="<?php echo $row['Apellido_Cliente']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">DNI:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Dni_Cliente" value="<?php echo $row['Dni_Cliente']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Domicilio:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Domicilio_Cliente" value="<?php echo $row['Domicilio_Cliente']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" style="position:relative; top:7px;">Celular:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="Celular_Cliente" value="<?php echo $row['Celular_Cliente']; ?>" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
            </div>
        </div>
	   </div>
	  </div>
	</div>
	</div>
	</div>













<!-- Ventana Mostrar Ficha -->
<div class="modal fade" id="fiha_<?php echo $row['Id_Cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Ficha del Cliente</h4></center>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group text-center">
                            <label for="fechaInicio">Fecha de inicio</label>
                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group text-center">
                            <label for="fechaDevolucion">Fecha de devolución</label>
                            <input type="date" class="form-control" id="fechaDevolucion" name="fechaDevolucion">
                        </div>
                    </div>
                </div>
            </div>

            

            
            <div class="modal-body">
              <div class="row">
                                     <!-- PRIMERA COLUMNA-->
                                        <div class="col-sm-6">
                                            <div class="container-fluid">
                                                 <form>
                                                        <div class="row form-group">
                                                            <div class="col-sm-10">
                                                                <label class="control-label" style="position:relative; top:7px;">Nombre:</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $row['Nombre_Cliente']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-10">
                                                                <label class="control-label" style="position:relative; top:7px;">Apellido:</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="Apellido_Cliente" value="<?php echo $row['Apellido_Cliente']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-10">
                                                                <label class="control-label" style="position:relative; top:7px;">DNI:</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="Dni_Cliente" value="<?php echo $row['Dni_Cliente']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-10">
                                                                <label class="control-label" style="position:relative; top:7px;">Domicilio:</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control" name="Domicilio_Cliente" value="<?php echo $row['Domicilio_Cliente']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-sm-10">
                                                                <label class="control-label" style="position:relative; top:7px;">Celular:</label>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <input type = "text" class="form-control" name="Celular_Cliente" value="<?php echo $row['Celular_Cliente']; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </form>
                                        </div>
                                    </div>
                                    

                                 <!-- SEGUNDA COLUMNA COLUMNA-->
                                    <div class="col-sm-6">
                                        <div class="container-fluid">

                                        <form>
                                                    <div class="row form-group">
                                                        <div class="col-sm-10">
                                                            <label class="control-label" style="position:relative; top:7px;">Nombre Disfraz:</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="Nombre_Disfraz" id = "in1" >
                                                        </div>
                                                    </div>   
                                                    
                                                    

                                                    <div class="row form-group">
                                                        <div class="col-sm-10">
                                                            <label class="control-label" style="position:relative; top:7px;">Tematica:</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="Apellido_Cliente" id = "in2" >
                                                        </div>
                                                    </div>


                                                    <div class="row form-group">
                                                        <div class="col-sm-10">
                                                            <label class="control-label" style="position:relative; top:7px;">Talla:</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="Dni_Cliente"  id = "in3" >
                                                        </div>
                                                    </div>


                                                    <div class="row form-group">
                                                        <div class="col-sm-10">
                                                            <label class="control-label" style="position:relative; top:7px;">Cantidad:</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="Domicilio_Cliente" id = "in4" >
                                                        </div>
                                                    </div>


                                                    <div class="row form-group">
                                                        <div class="col-sm-10">
                                                            <label class="control-label" style="position:relative; top:7px;">Precio:</label>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="Celular_Cliente" id = "in5" >
                                                        </div>
                                                    </div>

                                                    
                                                    <input id="add" type="button" name="agregar" value="Agregar" class="enviar">

                                            
                                                </form>
                                        </div>
                                    </div>


                                      <!--AQUI CONTENIDO DE LA TABLA-->
                                           




                                <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
                                 </div>            


            </div>  <!-- FIN ROW DE COLUMNAS--> 
                                                                   
	    </div> <!-- FIN  MODAL BODY-->
	  </div>  <!-- MODAL CONTENI-->



	      </div>  <!-- PRIMERA COLUMNA-->
	   </div> <!-- MODAL DIALOG-->











     

       
