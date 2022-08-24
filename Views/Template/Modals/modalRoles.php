<!-- Button trigger modal -->

<div class="modal fade" id="ModalFormRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <form id="form-rol" name="form-rol">
                <input type="hidden" name="idRol" id="idRol"value="">
                <div class="form-group">
                  <label class="control-label">Nombre</label>
                  <input class="form-control" type="text" id ="txtNombre" name="txtNombre"placeholder="Nomre del rol" required>
                </div>
                <div class="form-group">
                  <label class="control-label">Descripción</label>
                  <textarea class="form-control" rows="4" placeholder="descripcion"id="txtDescripcion" name="txtDescripcion"address></textarea>
                </div>
                <label for="exampleSelect1">Estado</label>
                <select class="form-control" name="listStatus"id="listStatus">
                      <option value="1">activo</option>
                      <option value="2">inactivo</option>
                    </select><div class="tile-footer">
                      
              <button class="btn btn-primary" type="submit" id="btnActionForm"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span> </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
            </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

