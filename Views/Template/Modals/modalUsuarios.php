<!-- Button trigger modal -->

<div class="modal fade" id="modalFormUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="titleModal" id="exampleModalScrollableTitle">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <form id="formUsuario" name="formUsuario">
                <input type="hidden" name="idUsuario"id="idUsuario" value="">
                <p cllass="text-primary">Todos los campos son obligatorios</p>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="control-label" for="txtIdentificacion">identificación</label>
                    <input type="text" class="form-control valid validNumber"  id="txtIdentificacion" name="txtIdentificacion"
                    required></input>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label" for="intDni">DNI</label>
                    <input type="text" class="form-control valid validNumber"  id="intDni" name="intDni"
                    required></input>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtNombre"class="control-label">Nombre</label>
                    <input class="form-control valid validText" type="text" id ="txtNombre" name="txtNombre"placeholder="Nombre " required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="textApellido"class="control-label">apellido</label>
                    <input class="form-control valid validText" type="text" id ="txtApellido" name="txtApellido"placeholder="apellido" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="intTelefono"class="control-label">teléfono</label>
                    <input class="form-control valid validNumber" type="text" id ="intTelefono" name="intTelefono" required="" onkeypress="return controlTag(event);">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="textEmail"class="control-label">Email</label>
                    <input class="form-control valid validEmail " type="email" id ="txtEmail" name="txtEmail" required>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="listRolid"class="control-label">tipo de usuario</label>
                    <select class="form-control" data-live-search="true" id ="listRolid" name="listRolid" required>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="listStatus"class="control-label">Status</label>
                    <select class="form-control selectpicker" id ="listStatus" name="listStatus" required>
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="form-row" id="optionPassword">
                  <div class="form-group col-md-6">
                    <button class="btn btn-lg btn-success" type="button" id="btnpasswordOption">Cambiar Contraseña</button>
                  </div>
                </div>
                <div class="form-row" id="PasswordPass">
                  <div class="form-group col-md-6">
                    <label for="txtPassword"class="control-label " id="passwordActual" >contraseña </label>
                    <input class="form-control" type="password" id ="txtPassword" name="txtPassword" required>
                  </div>
                </div>
                <div class="form-row " id="PasswordNew">
                  <div class="form-group col-md-6">
                    <label for="txtPasswordNew"class="control-label">ingresa nueva contraseña</label>
                    <input class="form-control" type="password" id ="txtPasswordNew" name="txtPasswordNew" required>
                  </div>
                </div>
                <div class="tile-footer">
                  <buttom id="btnTextGuardar" class="btn btn-success" type="submit" data-dismiss="modal" >Guardar</buttom>
                  <buttom id="btnActionForm" class="btn btn-danger" type="buttom" data-dismiss="modal" >Cerrar
                  </buttom>
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
</div>







<!-- Button trigger modal -->

<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header headerPrimary">
        <h5 class="titleModal" id="exampleModalScrollableTitle">Datos del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Identificación:</td>
              <td id="celIdentificacion">3131414</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id ="celNombre"> jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">ifran</td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td id="celTelefono">23413131</td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail">neanndaid</td>
            </tr>
            <tr>
              <td>DNI:</td>
              <td id="celDni">830203323</td>
            </tr>
            <tr>
              <td>Tipo Usuario:</td>
              <td id="celTipoUsuario">Larry</td>
            </tr>
            <tr>
              <td>Estado</td>
              <td id="celEstado">Larry</td>
            </tr>
            <tr>
              <td>FechaRegistro:</td>
              <td id="celFechaRegistro">Hola</td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn headerPrimary " data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>