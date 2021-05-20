<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <!-- <div class="col-sm-6">
          <h1>E-commerce</h1>
        </div> -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <div class="col-12" id="div_logo" style="text-align:center;">
              <!-- <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image"> -->
            </div>
          </div>
          <div class="col-12 col-sm-6">
              <h3 class="my-3 text-center" id="txt_titulo"></h3>              
              <h5 class="my-3" id="txt_desc"></h5>
              <h5 class="my-3" id="txt_categoria"></h5>
              <hr>
              <h4 class="mt-3">Cantidad <small></small></h4>
              <div id="div_cantidad">                
              </div>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0" id="txt_precio">
                </h2>
              </div>
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat" id="div_btn_carrito" style="display: none;" onClick="agregarCarrito();">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Agregar al Carrito
                </div>
              </div>
            </div>
        </div>
        <!-- <div class="row mt-4">
          <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
            </div>
          </nav>
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> </div>
          </div>
        </div> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </section>
  <!-- /.content -->
</div>