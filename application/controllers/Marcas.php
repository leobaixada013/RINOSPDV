<?php

defined ('BASEPATH') or exit ('Ação não permitida, Contate Leonardo Souza');

    class Marcas extends CI_Controller {
    
        public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou!');
            redirect('login');
        } 
        
    }
 
        public function index() {
        
        $data = array (
            
            'titulo' => 'Marcas Cadastrados',
            
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
           ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js'  ,
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
                ),
            'marcas' => $this->Rinos_bikes->get_all('marcas'),
            );
        
            $this->load->view('layout/header', $data);
            $this->load->view('marcas/index');
            $this->load->view('layout/footer');
        
    }

        public function add($marca_id = NULL) {
        
            $this->form_validation->set_rules('marca_nome', '', 'trim|required|min_length[4]|max_length[45]|is_unique[marcas.marca_nome]');
          
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'marca_nome',
                            'marca_ativa',

                        ), $this->input->post()
                );


                $data = html_escape($data);
                
                $this->Rinos_bikes->insert('marcas', $data);

                redirect('marcas');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Cadastrar Marcas',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
            );
             
            $this->load->view('layout/header', $data);
            $this->load->view('marcas/add');
            $this->load->view('layout/footer');
            }
    }
    
        public function edit($marca_id = NULL) {
        
            if(!$marca_id || !$this->Rinos_bikes->get_by_id('marcas', array('marca_id' => $marca_id))){
                $this->session->set_flashdata('error', 'Marcas Não Encontrado');
                redirect('marcas');
            }else{
         
            $this->form_validation->set_rules('marca_nome', '', 'trim|required|min_length[2]|max_length[45]|callback_check_marca_nome');
          
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'marca_nome',
                            'marca_ativa',

                        ), $this->input->post()
                );


                $data = html_escape($data);
                
                $this->Rinos_bikes->update('marcas', $data, array('marca_id' => $marca_id));

                redirect('marcas');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Atualizar Marcas',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                
                'marca' => $this->Rinos_bikes->get_by_id('marcas', array('marca_id' => $marca_id)),
            );
             
            $this->load->view('layout/header', $data);
            $this->load->view('marcas/edit');
            $this->load->view('layout/footer');
            }

        }

    }
  
        public function check_marca_nome($marca_nome) {

            $marca_id = $this->input->post('marca_id');
            
            if($this->Rinos_bikes->get_by_id('marcas', array('marca_nome' => $marca_nome, 'marca_id !=' => $marca_id))){
                $this->form_validation->set_message('check_marca_nome', 'Está Marca já existe!');
                return FALSE;
            } else {
             return TRUE;
            }
            
    }
 
         public function del($marca_id = NULL) {
            
        if(!$marca_id || !$this->Rinos_bikes->get_by_id('marcas', array('marca_id' => $marca_id))){
            $this->session->set_flashdata('error', 'Marca Não Encontrado');
            redirect('marcas');
        }else{
            
            $this->Rinos_bikes->delete('marcas', array('marca_id' => $marca_id));
            redirect('marcas');
        }
    }
    
    
}