<?php

defined ('BASEPATH') or exit ('Ação não permitida, Contate Leonardo Souza');

    class Servicos extends CI_Controller {
    
        public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou!');
            redirect('login');
        } 
        
    }
 
        public function index() {
        
        $data = array (
            
            'titulo' => 'Serviços Cadastrados',
            
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
           ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js'  ,
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
                ),
            'servicos' => $this->Rinos_bikes->get_all('servicos'),
            );
        
            $this->load->view('layout/header', $data);
            $this->load->view('servicos/index');
            $this->load->view('layout/footer');
        
    }
    
        public function add() {
        
        $this->form_validation->set_rules('servico_nome', '', 'trim|required|min_length[10]|max_length[145]|is_unique[servicos.servico_nome]');
            $this->form_validation->set_rules('servico_preco', '', 'trim|required');
            $this->form_validation->set_rules('servico_descricao', '', 'trim|required|max_length[700]');
          
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'servico_nome',
                            'servico_preco',
                            'servico_descricao',
                            'servico_ativo',

                        ), $this->input->post()
                );


                $data = html_escape($data);
                
                $this->Rinos_bikes->insert('servicos', $data);

                redirect('servicos');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Cadastrar Serviços',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                
            );
            
 
            $this->load->view('layout/header', $data);
            $this->load->view('servicos/add');
            $this->load->view('layout/footer');
            }

    }
    
        public function edit($servico_id = NULL) {
        
            if(!$servico_id || !$this->Rinos_bikes->get_by_id('servicos', array('servico_id' => $servico_id))){
                $this->session->set_flashdata('error', 'Serviço Não Encontrado');
                redirect('servicos');
            }else{
         
            $this->form_validation->set_rules('servico_nome', '', 'trim|required|min_length[10]|max_length[145]|callback_check_nome_servico');
            $this->form_validation->set_rules('servico_preco', '', 'trim|required');
            $this->form_validation->set_rules('servico_descricao', '', 'trim|required|max_length[700]');
          
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'servico_nome',
                            'servico_preco',
                            'servico_descricao',
                            'servico_ativo',

                        ), $this->input->post()
                );


                $data = html_escape($data);
                
                $this->Rinos_bikes->update('servicos', $data, array('servico_id' => $servico_id));

                redirect('servicos');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Atualizar Serviços',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                
                'servico' => $this->Rinos_bikes->get_by_id('servicos', array('servico_id' => $servico_id)),
            );
            
//            echo '<pre>';
//            print_r($data['vendedores']);
//            exit();
 
 
            $this->load->view('layout/header', $data);
            $this->load->view('servicos/edit');
            $this->load->view('layout/footer');
            }

        }

    }
    
        public function check_nome_servico($servico_nome) {

            $servico_id = $this->input->post('servico_id');
            
            if($this->Rinos_bikes->get_by_id('servicos', array('servico_nome' => $servico_nome, 'servico_id !=' => $servico_id))){
                $this->form_validation->set_message('check_nome_servico', 'Este Serviço já existe!');
                return FALSE;
            } else {
             return TRUE;
            }
            
    }
 
         public function del($servico_id = NULL) {
            
        if(!$servico_id || !$this->Rinos_bikes->get_by_id('servicos', array('servico_id' => $servico_id))){
            $this->session->set_flashdata('error', 'Serviço Não Encontrado');
            redirect('servicos');
        }else{
            
            $this->Rinos_bikes->delete('servicos', array('servico_id' => $servico_id));
            redirect('servicos');
        }
    }
    
}