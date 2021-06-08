
    <?php $this->load->view('layout/sidebar'); ?>


      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="<?php echo base_url('servicos'); ?>">Serviços</a></li>
             <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
              </ol>
            </nav>
   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                
                <form class="user" method="POST" name="form_edit">
                     <fieldset class="mt-1 border shadow p-1 m-2 m-lg-auto ">
                         <p><strong>&nbsp;<i class="fas fa-clock"></i>&nbsp;&nbsp;Última Alteração:&nbsp;&nbsp;</strong><?php echo formata_data_banco_com_hora($servico->servico_data_alteracao); ?></p>
                     </fieldset>
                    <fieldset class="mt-4 border p-2 mb-3">
                        
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;&nbsp;Dados do Serviço</legend>
                        
                        <div class="form-group row mb-4">
                        
                        <div class="col-md-6 mb-3">
                             <label>Nome do Serviço</label>
                             <input type="text" class="form-control form-control-user" name='servico_nome' placeholder="Nome do Serviço" value="<?php echo $servico->servico_nome; ?>">
                             <?php echo form_error('servico_nome', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-md-3">
                             <label>Preço</label>
                             <input type="text" class="form-control form-control-user money" name='servico_preco' placeholder="Preço do Serviço" value="<?php echo $servico->servico_preco; ?>">
                            <?php echo form_error('servico_preco', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                                 
                            <div class="col-md-3">
                            <label>Serviços Ativo</label>
                            <select class="custom-select" name="servico_ativo">
                                <option value="0" <?php echo ($servico->servico_ativo == 0 ? 'selected' : ''); ?> >Não</option>
                                <option value="1" <?php echo ($servico->servico_ativo == 1 ? 'selected' : ''); ?> >Sim</option>
                            </select>
                            </div>
                            <div class="col-md-12">
                            <label>Descrição do Serviço</label>
                            <textarea class="form-control form-control-user" name='servico_descricao'  placeholder="Serviço Descrição" style="min-height: 100px!important"><?php echo $servico->servico_descricao; ?></textarea>
                            <?php echo form_error('servico_descricao', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                            
                   </div>
                    </fieldset>
                    
                    <div class="form-group row">
                        <input type="hidden" name="servico_id" value="<?php echo $servico->servico_id; ?>"/>
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

      