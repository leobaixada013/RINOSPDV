
    <?php $this->load->view('layout/sidebar'); ?>


      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="<?php echo base_url('vendedores'); ?>">Fornecedores</a></li>
             <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
              </ol>
            </nav>
   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                
                <form class="user" method="POST" name="form_add">
                  
                    <fieldset class="mt-4 border p-2 mb-3">
                        
                        <legend class="font-small"><i class="fas fa-user-secret"></i>&nbsp;&nbsp;Dados Pessoais</legend>
                        
                        <div class="form-group row mb-4">
                        
                        <div class="col-md-6 mb-3">
                             <label>Nome Completo</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_nome_completo' placeholder="Nome Completo" value="<?php echo set_value('vendedor_nome_completo'); ?>">
                             <?php echo form_error('vendedor_nome_completo', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-md-3">
                             <label>CPF</label>
                             <input type="text" class="form-control form-control-user cpf" name='vendedor_cpf' placeholder="CPF do Vendedor" value="<?php echo set_value('vendedor_cpf'); ?>">
                            <?php echo form_error('vendedor_cpf', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-md-3 mb-3">
                             <label>RG</label>
                             <input type="text" class="form-control form-control-user " name='vendedor_rg' placeholder="RG do Vendedor" value="<?php echo set_value('vendedor_rg'); ?>">
                             <?php echo form_error('vendedor_rg', '<small class="form-text text-danger">','</small>'); ?>
                        </div>    
                            
                   </div>
                        
                        <div class="form-group row mb-4">
                        
                        <div class="col-md-6">
                             <label>E-Mail</label>
                             <input type="email" class="form-control form-control-user" name='vendedor_email' placeholder="E-Mail do Vendedor" value="<?php echo set_value('vendedor_email'); ?>">
                            <?php echo form_error('vendedor_email', '<small class="form-text text-danger">','</small>'); ?>
                        </div>    
                        <div class="col-md-3 mb-3">
                             <label>Telefone do Vendedor</label>
                             <input type="text" class="form-control form-control-user sp_celphones" name='vendedor_telefone' placeholder="Telefone do Vendedor" value="<?php echo set_value('vendedor_telefone'); ?>">
                             <?php echo form_error('vendedor_telefone', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        <div class="col-md-3 mb-3">
                             <label>Celular do Vendedor</label>
                             <input type="text" class="form-control form-control-user sp_celphones" name='vendedor_celular' placeholder="Celular do Vendedor" value="<?php echo set_value('vendedor_celular'); ?>">
                             <?php echo form_error('vendedor_celular', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                   </div>
                                                     
                    </fieldset>

                    <fieldset class="mt-4 border p-2 mb-3">
                        <legend class="font-small"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Dados de Endere??o</legend>
                        
                        <div class="form-group row mb-3">
                            
                            <div class="col-md-6">
                            <label>Endere??o</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_endereco'  placeholder="Endere??o" value="<?php echo set_value('vendedor_endereco'); ?>">
                            <?php echo form_error('vendedor_endereco', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                            <div class="col-md-2">
                            <label>Numero</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_numero_endereco'  placeholder="Numero" value="<?php echo set_value('vendedor_numero_endereco'); ?>">
                            <?php echo form_error('vendedor_numero_endereco', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                            <div class="col-md-4">
                            <label>Complemento</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_complemento'  placeholder="Complemento" value="<?php echo set_value('vendedor_completo'); ?>">
                            <?php echo form_error('vendedor_complemento', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                            
                        </div>
                        
                        <div class="form-group row mb-3">
                            
                        <div class="col-md-4">
                            <label>Bairro</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_bairro'  placeholder="Bairro" value="<?php echo set_value('vendedor_bairro'); ?>">
                            <?php echo form_error('vendedor_bairro', '<small class="form-text text-danger">','</small>'); ?>
                        </div> 
                            
                        <div class="col-md-4">
                            <label>Cidade</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_cidade' placeholder="Cidade" value="<?php echo set_value('vendedor_cidade'); ?>">
                            <?php echo form_error('vendedor_cidade', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                            
                        <div class="col-md-2">
                            <label>CEP</label>
                             <input type="text" class="form-control form-control-user cep" name='vendedor_cep' value="<?php echo set_value('vendedor_cep'); ?>">
                            <?php echo form_error('vendedor_cep', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                            
                        <div class="col-md-2">
                            <label>UF</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_estado'  placeholder="Estado" value="<?php echo set_value('vendedor_estado'); ?>">
                            <?php echo form_error('vendedor_estado', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                          
                        </div>
                        
                    </fieldset>
                    
                    <fieldset class="mt-4 border p-2 mb-3">
                        <legend class="font-small"><i class="fas fa-tools"></i>&nbsp;&nbsp;Configura????es</legend>
                        
                        <div class="form-group row mb-3">
                            
                            <div class="col-md-3">
                            <label>Vendedor Ativo</label>
                            <select class="custom-select" name="vendedor_ativo">
                                <option value="0" >N??o</option>
                                <option value="1" >Sim</option>
                            </select>
                            </div>
                            
                            <div class="col-md-3">
                            <label>Matr??cula do Vendedor</label>
                             <input type="text" class="form-control form-control-user" name='vendedor_codigo' value="<?php echo $vendedor_codigo ?>" readonly"">
                           </div>
                            
                            <div class="col-md-6">
                            <label>Observa????es</label>
                            <textarea class="form-control form-control-user" name='vendedor_obs'  placeholder="Observa????es"><?php echo set_value('vendedor_obs'); ?></textarea>
                            <?php echo form_error('vendedor_obs', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        
                        </div>
                        
                    </fieldset>
                    
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>&nbsp;Salvar</button>
                        <a title="Voltar" href="<?php echo base_url($this->router->fetch_class()); ?>" class="btn btn-success btn-sm ml-2"><i class="fas fa-undo-alt"></i>&nbsp;Voltar</a>


                   </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      