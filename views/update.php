
<section>
  <h3>Modificar empleado</h3>
    <div clasa="col s12">
      <a href="/home" class="btn">Regresar</a>
  </div>

  <div class="col s12">
    <form style="width: 45%; margin: 0 auto;" method="POST" action="/save">
      <?php foreach( $employe as $key => $val ):?>
        <?php echo $key.':'?> <input type="text" name="<?php echo $key?>" value="<?php echo $val ?>">
      <?php endforeach;?>
      <input type="submit" name="submit" value="Guardar">
    </form>    
  </div>
</section>
<div id="delete3" class="modal">
  <div class="modal-content">
    <h4>Eliminar 3</h4> 
    <p>A bunch of text</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Eliminar</a>
  </div>
</div>

<!-- Modal Structure Delete 3-->
<div id="search" class="modal">
  <div class="modal-content">
      <h4>Buscar</h4>
      <form class="col s12" method="post" action="buscar">
          <div class="row">
              <div class="input-field col s6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="icon_prefix" type="text" class="validate">
                  <label for="icon_prefix">Cédula</label>
              </div>
          </div>
      </form>
  </div>
  <div class="modal-footer">
    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Buscar</a>
  </div>
</div>
<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
