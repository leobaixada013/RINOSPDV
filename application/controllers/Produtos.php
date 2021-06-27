<?php

defined ('BASEPATH') or exit ('Ação não permitida, Contate Leonardo Souza');

    class Produtos extends CI_Controller {
    
        public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou!');
            redirect('login');
        } 
        
        $this->load->model('produtos_bikes');
        
    }
 
        public function index() {
        
        $data = array (
            
            'titulo' => 'Produtos Cadastrados',
            
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
           ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js'  ,
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
                ),
            'produtos' => $this->produtos_bikes->get_all('produtos'),
            );
        
//            echo '<pre>';
//            print_r($data['produtos']);
//            exit();
        
            $this->load->view('layout/header', $data);
            $this->load->view('produtos/index');
            $this->load->view('layout/footer');
        
    }
    
        public function edit($produto_id = NULL) {
            
        if (!$produto_id || !$this->Rinos_bikes->get_by_id('produtos', array('produto_id' => $produto_id))){
            $this->session->set_flashdata('error', 'Produto não encontrado');
            redirect('produtos'); 
        }else{
            
            $data = array (
            
                'titulo' => 'Atualizar Produto',
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                'produto' => $this->Rinos_bikes->get_by_id('produtos', array('produto_id' => $produto_id)),
                
                'marcas' => $this->Rinos_bikes->get_all('marcas'),
                'categorias' => $this->Rinos_bikes->get_all('categorias'),
                'fornecedores' => $this->Rinos_bikes->get_all('fornecedores'),
                
            );
            
            /*<!-- 
            [produto_codigo] => 72495380
            [produto_data_cadastro] => 
            [produto_categoria_id] => 1
            [produto_marca_id] => 1
            [produto_fornecedor_id] => 1
            [produto_descricao] => Notebook gamer
            [produto_unidade] => UN
            [produto_codigo_barras] => 4545
            [produto_ncm] => 5656
            [produto_preco_custo] => 1.800,00
            [produto_preco_venda] => 15.031,00
            [produto_estoque_minimo] => 2
            [produto_qtde_estoque] => 2
            [produto_ativo] => 1
            [produto_obs] => 
            -->*/
            
            
            $this->load->view('layout/header', $data);
            $this->load->view('produtos/edit');
            $this->load->view('layout/footer');
            
        }
            
    }
    
}