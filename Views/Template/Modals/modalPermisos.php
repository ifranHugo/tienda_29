  
<div class="modal fade modalPermisos bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"> 
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4" id="myExtraLargeModalLabel">Permisos Roles de usuarios</h5>
        <button type="button" calss="close" data-dismiss="modal" aria-label="Close"> 
          <span aria-hiden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="tile">
            <form action="" id="formPermisos" name ="formPermisos">
              <input type="hidden" id="idrol"name="idrol" value="<?=$data['idrol']?>" required="">
              <div class="table-responsiveidrol" >
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Módulo</th>
                      <th>Ver</th>
                      <th>Crear</th>
                      <th>Actualizar</th>
                      <th>Eliminar</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no =1;
                        $modulos = $data['modulos'];
                        for ($i=0; $i < count($modulos) ; $i++) { 
                          $permisos= $modulos[$i]['permisos'];
                          $rCheck =$permisos['r']==1 ? " checked " :"";
                          $wCheck =$permisos['w']==1 ? "checked" :"";
                          $uCheck =$permisos['u']==1 ? " checked " :"";
                          $dCheck =$permisos['d']==1 ? "checked" :"";
                          
                          $idmod=$modulos[$i]['idmodulo'];
                      ?>
                    <tr>
                      <td>
                        <div class="toggle-flip">
                        <?= $no;?>
                        <input type="hidden" name="modulos[<?=$i?>][idmodulo]"  value="<?= $idmod ?>" required>
                        </div>
                      </td>
                      
                      <td>
                        <div class="toggle-flip">
                          <?= $modulos[$i]['titulo']; ?>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name ="modulos[<?=$i?>][r]" <?=$rCheck?>><span class="flip-indecator"  data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox"  name ="modulos[<?=$i?>][w]" <?=$wCheck?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox"  name ="modulos[<?=$i?>][u]" <?=$uCheck?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                      <td>
                        <div class="toggle-flip">
                          <label>
                            <input type="checkbox" name ="modulos[<?=$i?>][d]" <?=$dCheck?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
              <div class="text-center">
                <button class="btn btn-success" type="submit"><i class="fa fa-check-circle-o" aria-hidden="true"></i>Guardar</button>
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-sign-out" aria-hidden="true"></i>Salir</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

 