
    <?php $this->load->view('layout/sidebar'); ?>


      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="<?php echo base_url('marcas'); ?>">Marcas</a></li>
             <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
              </ol>
            </nav>
   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                
                <form class="user" method="POST" name="form_edit">
                     <fieldset class="mt-1 border shadow p-1 m-2 m-lg-auto ">
                         <p><strong>&nbsp;<i class="fas fa-clock"></i>&nbsp;&nbsp;Última Alteração:&nbsp;&nbsp;</strong><?php echo formata_data_banco_com_hora($marca->marca_data_alteracao); ?></p>
                     </fieldset>
                    <fieldset class="mt-4 border p-2 mb-3">
                        
                        <legend class="font-small"><i class="fas fa-cubes"></i>&nbsp;&nbsp;Dados da Marca</legend>
                        
                        <div class="form-group row mb-4">
                        
                        <div class="col-md-8 mb-3">
                             <label>Nome da Marca</label>
                             <input type="text" class="form-control form-control-user" name='marca_nome' placeholder="Nome da Marca" value="<?php echo $marca->marca_nome; ?>">
                             <?php echo form_error('marca_nome', '<small class="form-text text-danger">','</small>'); ?>
                        </div>

                                 
                            <div class="col-md-4">
                            <label>Marca Ativa</label>
                            <select class="custom-select" name="marca_ativa">
                                <option value="0" <?php echo ($marca->marca_ativa == 0 ? 'selected' : ''); ?> >Não</option>
                                <option value="1" <?php echo ($marca->marca_ativa == 1 ? 'selected' : ''); ?> >Sim</option>
                            </select>
                            </div>
                            
                   </div>
                    </fieldset>
                    
                    <div class="form-group row">
                        <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id; ?>"/>
                    </div>  
                    
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;Salvar</button>
                        <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-undo-alt"></i>&nbsp;Voltar</a>


                   </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      