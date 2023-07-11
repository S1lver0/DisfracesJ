<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Agregar Nuevo Registro</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="AgregarNuevo.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombres:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Nombre_Cliente">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Apellido_Cliente">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Dni:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Dni_Cliente">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Domicilio:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Domicilio_Cliente">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Celular:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="Celular_Cliente">
					</div>
				</div>
			</form>


            </div> 
			</div>

			
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                
				<style>
						.root {
							background: linear-gradient(45deg, #FE6B8B 30%, #FF8E53 90%);
							border-radius: 3px;
							border: none;
							color: white;
							height: 48px;
							padding: 0 30px;
							box-shadow: 0 3px 5px 2px rgba(255, 105, 135, 0.3);
						}
				</style>

						<button type="submit" name="agregar" class="root">Guardar Registro</button>
			
            </div>
		
        </div>
    </div>
</div>


<script>
			import React from 'react';
			import PropTypes from 'prop-types';
			import clsx from 'clsx';
			import Button from '@material-ui/core/Button';
			import { withStyles } from '@material-ui/core/styles';

			// We can inject some CSS into the DOM.
			const styles = {
			root: {
				background: 'linear-gradient(45deg, #FE6B8B 30%, #FF8E53 90%)',
				borderRadius: 3,
				border: 0,
				color: 'white',
				height: 48,
				padding: '0 30px',
				boxShadow: '0 3px 5px 2px rgba(255, 105, 135, .3)',
			},
			};

			function ClassNames(props) {
			const { classes, children, className, ...other } = props;

			return (
				<Button className={clsx(classes.root, className)} {...other}>
				{children || 'class names'}
				</Button>
			);
			}

			ClassNames.propTypes = {
			children: PropTypes.node,
			classes: PropTypes.object.isRequired,
			className: PropTypes.string,
			};

			export default withStyles(styles)(ClassNames);
</script>