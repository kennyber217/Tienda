<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mi(s) Usuaio(s)</h1>
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
              <h5 class="card-title">Bandeja de Administración</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3" style="padding: 20px 0px 20px 7px;">
                  <button type="button" class="btn btn-block btn-primary" onClick="mNuevoRegistro();">
                    Nuevo Usuario
                  </button>
                </div>
                <div class="col-sm-12" style="min-height: 500px" id="div_body">
                  <table class="table table-striped table-dark table-bordered" id="tbl_data">
                    <thead>
                      <tr class="text-center">
                        <th style="width:  5%;">N°</th>
                        <th style="width: 30%;">Persona</th>
                        <th style="width: 30%;">Email</th>
                        <th style="width: 20%;">Rol</th>
                        <th style="width:  5%;">Estado</th>
                        <th style="width: 10%;">Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- modals -->
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mFormRegistro">
  Launch static backdrop modal
</button> -->
<!-- Modal -->
<div class="modal fade" id="mFormRegistro" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="txt_modal_titulo"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="txt_id" name="txt_id" hidden/>
        <div class="form-group row">
          <label for="user" class="col-form-label col-sm-2">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txt_email" name="txt_email" autocomplete="off"/>
          </div>
        </div>     
        <div class="form-group row">
          <label for="user" class="col-form-label col-sm-2">Nombre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" autocomplete="off"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="user" class="col-form-label col-sm-2">Apellido Paterno</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txt_apellido_paterno" name="txt_apellido_paterno" autocomplete="off"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="user" class="col-form-label col-sm-2">Apellido Materno</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="txt_apellido_materno" name="txt_apellido_materno" autocomplete="off"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="user" class="col-form-label col-sm-2">Categoria</label>
          <div class="col-sm-10">
            <select class="form-control select2bs4" style="width: 100%;" id="cbo_rol" name="cbo_rol">
              <option value="">---Seleccione Categoria---</option>
              <option value="1">Administrador</option>
              <option value="2">Vendedor</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick="editarRegistro();" id="btn_actualizarRegistro">Actualizar</button>
        <button type="button" class="btn btn-primary" onClick="nuevoRegistro();" id="btn_nuevoRegistro">Nuevo</button>
      </div>
    </div>
  </div>
</div>