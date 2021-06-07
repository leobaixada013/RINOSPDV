<?php

defined ('BASEPATH') or exit ('Ação não permitida, Contate Leonardo Souza');

    class Categorias extends CI_Controller {
    
        public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou!');
            redirect('login');
        } 
        
    }
 
        public function index() {
        
        $data = array (
            
            'titulo' => 'Categorias Cadastrados',
            
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
           ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js'  ,
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
                ),
            'categorias' => $this->Rinos_bikes->get_all('categorias'),
            );
        
            $this->load->view('layout/header', $data);
            $this->load->view('categorias/index');
            $this->load->view('layout/footer');
        
    }

        public function add() {
        
            $this->form_validation->set_rules('categoria_nome', '', 'trim|required|min_length[4]|max_length[45]|is_unique[categorias.categoria_nome]');
          
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'categoria_nome',
                            'categoria_ativa',

                        ), $this->input->post()
                );


                $data = html_escape($data);
                
                $this->Rinos_bikes->insert('categorias', $data);

                redirect('categorias');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Cadastrar Categoria',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
            );
             
            $this->load->view('layout/header', $data);
            $this->load->view('categorias/add');
            $this->load->view('layout/footer');
            }
    }
    
        public function edit($categoria_id = NULL) {
        
            if(!$categoria_id || !$this->Rinos_bikes->get_by_id('categorias', array('categoria_id' => $categoria_id))){
                $this->session->set_flashdata('error', 'Categoria Não Encontrado');
                redirect('categorias');
            }else{
         
            $this->form_validation->set_rules('categoria_nome', '', 'trim|required|min_length[2]|max_length[45]|callback_check_categoria_nome');
          
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'categoria_nome',
                            'categoria_ativa',

                        ), $this->input->post()
                );


                $data = html_escape($data);
                
                $this->Rinos_bikes->update('categorias', $data, array('categoria_id' => $categoria_id));

                redirect('categorias');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Atualizar Categoria',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                
                'categoria' => $this->Rinos_bikes->get_by_id('categorias', array('categoria_id' => $categoria_id)),
            );
             
            $this->load->view('layout/header', $data);
            $this->load->view('categorias/edit');
            $this->load->view('layout/footer');
            }

        }

    }
  
        public function check_categoria_nome($categoria_nome) {

            $categoria_id = $this->input->post('categoria_id');
            
            if($this->Rinos_bikes->get_by_id('categorias', array('categoria_nome' => $categoria_nome, 'categoria_id !=' => $categoria_id))){
                $this->form_validation->set_message('check_categoria_nome', 'Está Categoria já existe!');
                return FALSE;
            } else {
             return TRUE;
            }
            
    }
 
         public function del($categoria_id = NULL) {
            
        if(!$categoria_id || !$this->Rinos_bikes->get_by_id('categorias', array('categoria_id' => $categoria_id))){
            $this->session->set_flashdata('error', 'Categoria Não Encontrado');
            redirect('categorias');
        }else{
            
            $this->Rinos_bikes->delete('categorias', array('categoria_id' => $categoria_id));
            redirect('categorias');
        }
    }
    
    
}