<section>

    <nav style="background: #26a69a;">
      <div class="nav-wrapper">
          <div style="margin: 0 0 0 31px;"><a href="#!" class="brand-logo">ADMINISTRADOR</a></div>
          <ul class="right hide-on-med-and-down">
                <li><a class="modal-trigger" href="#create_employee">Crear</a></li>
                <li><a class="modal-trigger" href="#search">Buscar</a></li>
                <li><a href="login">Salir</a></li>
          </ul>
      </div>
    </nav>
    
    <div clasa="col s12" style="text-align:center"><h4>Lista de empleados</h4></div>
    
    <table style="width: 90%; display: table; margin:0 auto" class="striped">
        <thead> 
          <tr>
              <th data-field="id">Nombre</th>
              <th data-field="name">Apellido</th>
              <th data-field="price">Cédula</th>
              <th data-field="price">Dirección</th>
              <th data-field="price">Telefono</th>
              <th data-field="price">Celular</th>
              <th data-field="price">Email</th>
              <th data-field="price">Acciones</th>
              <th></th>
          </tr>
        </thead>
        <tbody>
     	<?php foreach( $employes as $id => $employe ):?>
         	<tr> 
         	<td><?php echo isset($employe->NOMBRE) ? $employe->NOMBRE:$employe->nombres ?></td>
         	<td><?php echo isset($employe->APELLIDO) ? $employe->APELLIDO:$employe->apellidos ?></td>
         	<td><?php echo isset($employe->IDENTIFICACION) ? $employe->IDENTIFICACION:$employe->identificacion ?></td>
         	<td><?php echo isset($employe->DIRECCION) ? $employe->DIRECCION:$employe->direccion ?></td>
         	<td><?php echo isset($employe->TELEFONO) ? $employe->TELEFONO:$employe->telefono ?></td>
         	<td><?php echo isset($employe->CELULAR) ? $employe->CELULAR:$employe->celular ?></td>
         	<td><?php echo isset($employe->EMAIL) ? $employe->EMAIL:$employe->email ?></td>
            <td colspan="2">
                <a href="#" class="employe-update" data='<?php echo json_encode($employe)?>'><i class="material-icons">&#xE254;</i></a>
                <a href="#delete<?php echo $id ?>" class="modal-trigger"><i class="material-icons">&#xE872;</i></a>
                <!-- Modal Structure Delete 1-->
                <div id="delete<?php echo $id ?>" class="modal">
                  <div class="modal-content">
                    <h4>ELIMINAR EMPLEADO </h4>
                    <p>Nombre: <?php echo isset($employe->NOMBRE) ? $employe->NOMBRE:$employe->nombres ?></p>
                    <p>Cédula: <?php echo isset($employe->IDENTIFICACION) ? $employe->IDENTIFICACION:$employe->identificacion?></p>
                  </div>
                  <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Eliminar</a>
                  </div>
                </div>

            </td>
      		</tr>
       	<?php endforeach;?>

            <div id="update" class="modal">
                <nav style="background: #26a69a;">
                    <div class="nav-wrapper">
                        <div style="margin: 0 0 0 31px;"><a href="#!" class="brand-logo">Editar Usuario</a></div>
                        <ul class="right hide-on-med-and-down">
                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">X</a>
                        </ul>
                    </div>
                </nav>
                <div class="modal-content" id="form-submit">

                </div>
                
                <div class="modal-footer">
                    <input type="submit" id="submit" name="submit" class="btn" value="Guardar">
                    <a href="javascript:location.reload()" id="success" class="btn">Aceptar</a>
                </div> 
            </div>
        </tbody>
      </table>
</section>

<div id="search" class="modal">
    <ul class="right hide-on-med-and-down">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">X</a>
    </ul>
    <form class="col s12" method="get" action="">
        <div class="modal-content">
            <h4>Buscar</h4>
            <input type="hidden" name="search">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" name="doc" type="number" class="validate">
                <label for="icon_prefix">Cédula</label>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit"  class="btn" value="Buscar">
        </div>
    </form>
</div>

<div id="create_employee" class="modal">
    <ul class="right hide-on-med-and-down">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">X</a>
    </ul>
    <form class="col s12" method="post" action="">
        <div class="modal-content">
            <h4>Crear Empleado</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input type="hidden" name="create">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" name="doc" type="number" class="validate">
                    <label for="icon_prefix">Cédula</label>
                    <input type="text" name="token">
                    <input type="text" name="nombres">
                    <input type="text" name="apellidos">
                    <input type="text" name="identificacion">
                    <input type="text" name="direccion">
                    <input type="text" name="telefono">
                    <input type="text" name="celular">
                    <input type="text" name="email">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit"  class="btn" value="Crear">
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
        $(".button-collapse").sideNav();
        $('.employe-update').click(function (){
        	$('#submit').show()
            $('#success').hide()
        	$('#update').modal('open')
        	var data = jQuery.parseJSON($(this).attr('data'))
        	$('#form-submit').html(form_generate(data))
        	ajax()
        });
    });
    function form_generate(data){
    	var html = '<form id="send-data">'
    	$.each(data,function (i,val){
    		html += i+':'+'<input type="text" name="'+i+'" value="'+val+'">'
    	});
    	html+= '</form>'
    	return html
    }
    function ajax(){
    	$('#submit').click(function(){
			$.ajax({
			  method:"POST",
			  url: "<?php echo $url ?>save", 
			  data: $("#send-data").serialize(),
			})
		  	.done(function( msg ) {
		  	    $('#form-submit').html(msg['response'])
		  	    $('#submit').hide()
                $('#success').show()
			});
		});
    }
</script>
