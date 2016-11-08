
<section>
    
    <div clasa="col s12">
        <a href="login" class="btn">Salir</a>
    </div>
    <h1>Bienvenido al Administrador</h1>
    <h2>Lista de empleados</h2>

 <table>
        <thead>
          <tr>
              <th data-field="id">Name</th>
              <th data-field="name">Item Name</th>
              <th data-field="price">Item Price</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>$0.87</td>
            <td>
                <a class="modal-trigger" href="#edit1"><i class="material-icons">&#xE254;</i></a>
                <a class="modal-trigger" href="#delete1" ><i class="material-icons">&#xE872;</i></a>
            </td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>$3.76</td>
            <td>
                <a class="modal-trigger" href="#edit2"><i class="material-icons">&#xE254;</i></a>
                <a class="modal-trigger" href="#delete2"><i class="material-icons">&#xE872;</i></a>
            </td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>$7.00</td>
            <td>
                <a class="modal-trigger" href="#edit3"><i class="material-icons">&#xE254;</i></a>
                <a class="modal-trigger" href="#delete3"><i class="material-icons">&#xE872;</i></a>
            </td>
          </tr>
        </tbody>
      </table>
</section>

 <!-- Modal Structure Edit 1-->
  <div id="edit1" class="modal">
    <div class="modal-content">
      <h4>Editar 1</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Editar</a>
    </div>
  </div>

   <!-- Modal Structure Edit 2-->
  <div id="edit2" class="modal">
    <div class="modal-content">
      <h4>Editar 2</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Editar</a>
    </div>
  </div>

   <!-- Modal Structure Edit 3-->
  <div id="edit3" class="modal">
    <div class="modal-content">
      <h4>Editar 3</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Editar</a>
    </div>
  </div>


   <!-- Modal Structure Delete 1-->
  <div id="delete1" class="modal">
    <div class="modal-content">
      <h4>Eliminar 1</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Eliminar</a>
    </div>
  </div>

   <!-- Modal Structure Delete 2-->
  <div id="delete2" class="modal">
    <div class="modal-content">
      <h4>Eliminar 2</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Eliminar</a>
    </div>
  </div>

   <!-- Modal Structure Delete 3-->
  <div id="delete3" class="modal">
    <div class="modal-content">
      <h4>Eliminar 3</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Eliminar</a>
    </div>
  </div>

<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>
