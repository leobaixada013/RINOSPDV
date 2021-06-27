
    <?php $this->load->view('layout/sidebar'); ?>


      <!-- Main Content -->
      <div id="content">

    <?php $this->load->view('layout/navbar'); ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="<?php echo base_url('produtos'); ?>">Produtos</a></li>
             <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
              </ol>
            </nav>
   
            

            
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                
                <form class="user" method="POST" name="form_edit">
                     <fieldset class="mt-1 border shadow-sm p-1 m-1 mt-lg-1 m-lg-auto ">
                         <strong>&nbsp;<i class="fas fa-clock"></i>&nbsp;&nbsp;Última Alteração:&nbsp;&nbsp;</strong><?php echo formata_data_banco_com_hora($produto->produto_data_alteracao); ?>
                     </fieldset>
                    <fieldset class="mt-3 border p-2 mb-1">
                        <legend class="font-small"><i class="fas fa-parachute-box"></i>&nbsp;&nbsp;Dados Principais</legend>
                        
                    <div class="form-group row mb-4">
                        
                        <div class="col-md-2 mb-3">
                             <label>Código Interno do Produto</label>
                             <input type="text" class="form-control form-control-user" name='produto_codigo' value="<?php echo $produto->produto_codigo; ?>" readonly="">
                             </div>
                        
                        <div class="col-md-10">
                             <label>Descrição do Produto</label>
                             <input type="text" class="form-control form-control-user" name='produto_descricao' placeholder="Descrição do Produto" value="<?php echo $produto->produto_descricao; ?>">
                            <?php echo form_error('produto_preco', '<small class="form-text text-danger">','</small>'); ?>
                        </div>
                        
                    </div>
                        
                    <div class="form-group row mb-4">
                        
                        <div class="col-md-4 mb-3">
                             <label>Marca</label>
                             <select class="custom-select" name="produto_marca_id">
                                 <?php foreach ($marcas as $marca): ?>
                                 <option title="<?php echo ($marca->marca_ativa == 0 ? 'Marca Desativada, Não pode ser escolhida' : 'Marca Ativa');?>" value="<?php echo $marca->marca_id?>" <?php echo ($marca->marca_id == $produto->produto_marca_id ? 'selected' : '') ?> <?php echo ($marca->marca_ativa == 0 ? 'disabled' : '') ?> > <?php echo ($marca->marca_ativa == 0 ? $marca->marca_nome . '&nbsp;->&nbsp;Inativa' : $marca->marca_nome) ?></option>
                                 <?php endforeach; ?>
                             </select>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                             <label>Categoria</label>
                             <select class="custom-select" name="produto_categoria_id">
                                 <?php foreach ($categorias as $categoria): ?>
                                  <option title="<?php echo ($categoria->categoria_ativa == 0 ? 'Categoria Desativada, Não pode ser escolhida' : 'Categoria Ativa');?>" value="<?php echo $categoria->categoria_id?>" <?php echo ($categoria->categoria_id == $produto->produto_categoria_id ? 'selected' : '') ?> <?php echo ($categoria->categoria_ativa == 0 ? 'disabled' : '') ?> > <?php echo ($categoria->categoria_ativa == 0 ? $categoria->categoria_nome . '&nbsp;->&nbsp;Inativa' : $categoria->categoria_nome) ?></option>
                                 <?php endforeach; ?>
                             </select>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                             <label>Fornecedor</label>
                             <select class="custom-select" name="produto_fornecedor_id">
                                 <?php foreach ($fornecedores as $fornecedor): ?>
                                 <option title="<?php echo ($fornecedor->fornecedor_ativo == 0 ? 'Fornecedor Desativado, Não pode ser escolhido' : 'Fornecedor Ativo');?>" value="<?php echo $fornecedor->fornecedor_id?>" <?php echo ($fornecedor->fornecedor_id == $produto->produto_fornecedor_id ? 'selected' : '') ?> <?php echo ($fornecedor->fornecedor_ativo == 0 ? 'disabled' : '') ?> > <?php echo ($fornecedor->fornecedor_ativo == 0 ? $fornecedor->fornecedor_nome_fantasia . '&nbsp;->&nbsp;Inativa' : $fornecedor->fornecedor_nome_fantasia) ?></option>
                                 <?php endforeach; ?>
                             </select>
                        </div>
                        
                    </div>
                        
                    </fieldset>
                    
                        <div class="form-group row">
                            <input type="hidden" name="produto_id" value="<?php echo $produto->produto_id; ?>"/>
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

      