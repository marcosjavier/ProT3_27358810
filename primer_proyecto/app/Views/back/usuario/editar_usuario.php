<div class="container mt-0 mb-0">
  <div class="card">
    <div class="card-header text-justify">
      <div class="row d-flex justify-content-center">
        <div class="card col-lg-3 " style="width: 50%;">
        <h4>Editar Usuario</h4>
        <?php $validation = \Config\Services::validation(); ?>
          <form method="post" action="<?php echo base_url('/enviarForm') ?>">
            <?=csrf_field();?>
            <?=csrf_field();?>
            <?php if (!empty (session()->getFlashdata('fail')) ):?>
              <div class="alert alert-danger"><?=session()->getFlashdata('fail');?> </div>
            <?php endif?>
            <?php if (!empty (session()->getFlashdata('success')) ):?>
              
              <div class="alert alert-danger"><?=session()->getFlashdata('success');?> </div>
            <?php endif?>
        </div>
  
      </div>
    </div>
    <div class="card-body justify-content-center" >
      <div class="form">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nombre</label>
          <input type="text" name="nombre" class="form-control" value="<?= $datos['nombre']?>">
          <!-- Error -->
          <?php if ($validation->getError('nombre')):?> 
            
            <div class="alert-danger mt-2">
              <?= $error = $validation->getError('nombre'); ?>
            </div> 
          <?php endif?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Apellido</label>
          <input type="text" name="apellido" class="form-control" value="<?= $datos['apellido']?>">
            <!--Error-->
            <?php if ($validation->getError('apellido')):?>
              
              <div class="alert-danger mt-2">
                <?= $error = $validation->getError('apellido'); ?>
              </div> 
            <?php endif?>
  
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">email</label>
          <input type="text" name="email" class="form-control" value="<?= $datos['email']?>">
          <!--Error-->
          <?php if ($validation->getError('email')):?>
            
            <div class="alert-danger mt-2">
              <?= $error = $validation->getError('email'); ?>
            </div>
          <?php endif?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Usuario</label>
          <input type="text" name="usuario" class="form-control" value="<?= $datos['usuario']?>">
          <!--Error-->
          <?php if ($validation->getError('usuario')):?>
            
            <div class="alert-danger mt-2">
              <?= $error = $validation->getError('usuario'); ?>
            </div> 
          <?php endif?>
        </div>
        
        <input type="submit" value="guardar" class="btn btn-success">
        <input type="reset" value="cancelar" class="btn btn-danger">
  
  
      </div>
          </form>
  
    </div>

  </div>
 
<div>
  