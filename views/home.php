
<section>
    
    <div clasa="col s12">
        <a href="login" class="btn">Salir</a>
    </div>
    <h1>Bienvenido al Administrador</h1>
    <h2>Lista de empleados</h2>
    <div>
        <a class="modal-trigger" href="#search">Buscar</a>
    </div>
    <table>
        <thead>
          <tr>
              <th data-field="id">Nombres</th>
              <th data-field="name">Apellidos</th>
              <th data-field="price">Cédula</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>1026561971 </td>
            <td>
                <a href="buscar/ 1026561971"><i class="material-icons">&#xE254;</i></a>
                <a class="modal-trigger" href="#delete1" ><i class="material-icons">&#xE872;</i></a>
            </td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>3.76</td>
            <td>
                <a href="buscar/3.76"><i class="material-icons">&#xE254;</i></a>
                <a class="modal-trigger" href="#delete2"><i class="material-icons">&#xE872;</i></a>
            </td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>7.00</td>
            <td>
                <a href="buscar/7.00"><i class="material-icons">&#xE254;</i></a>
                <a class="modal-trigger" href="#delete3"><i class="material-icons">&#xE872;</i></a>
            </td>
          </tr>
        </tbody>
      </table>
</section>


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
