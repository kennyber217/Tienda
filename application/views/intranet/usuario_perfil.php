<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <!-- <h1 class="m-0">Mi Perfil</h1> -->
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Mi Perfil</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12" style="" id="div_body">
                  <input type="text" id="txt_id" name="txt_id" hidden/>
                  <input type="text" id="cbo_rol" name="cbo_rol" hidden/>
                  <div class="form-group row">
                    <label for="user" class="col-form-label col-sm-2">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_email" name="txt_email" autocomplete="off"/>
                    </div>
                  </div>     
                  <div class="form-group row">
                    <label for="user" class="col-form-label col-sm-2">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" autocomplete="off" onKeyUp="activarDivChange();"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="user" class="col-form-label col-sm-2">Apellido Paterno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_apellido_paterno" name="txt_apellido_paterno" autocomplete="off" onKeyUp="activarDivChange();"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="user" class="col-form-label col-sm-2">Apellido Materno</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txt_apellido_materno" name="txt_apellido_materno" autocomplete="off" onKeyUp="activarDivChange();"/>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="user" class="col-form-label col-sm-2">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="txt_password" name="txt_password" autocomplete="off" onKeyUp="activarDivChange();"/>
                    </div>
                  </div>
                </div>
                <div class="row col-sm-12" style="" id="div_btn" style="display: none;">
                  <div class="col-sm-2" style="" id="div_btn">
                    <button type="button" class="btn btn-block btn-danger" onClick="cacelarEditarRegistro();">Cancelar</button>
                  </div>
                  <div class="col-sm-8" style="" id="div_btn">
                  </div>
                  <div class="col-sm-2" style="" id="div_btn">
                    <button type="button" class="btn btn-block btn-success" onClick="editarRegistro();">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>