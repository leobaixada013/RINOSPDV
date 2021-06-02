<?php

defined ('BASEPATH') or exit ('Ação não permitida, Contate Leonardo Souza');

    class Vendedores extends CI_Controller {
    
        public function __construct(){
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou!');
            redirect('login');
        } 
        
    }
 
        public function index() {
        
        $data = array (
            
            'titulo' => 'Vendedores Cadastrados',
            
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
           ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js'  ,
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
                ),
            'vendedores' => $this->Rinos_bikes->get_all('vendedores'),
            );
//            echo '<pre>';
//            print_r($data['vendedores']);
//            exit();
        
            $this->load->view('layout/header', $data);
            $this->load->view('vendedores/index');
            $this->load->view('layout/footer');
        
    }
    
        public function add() {
        
            $this->form_validation->set_rules('vendedor_nome_completo', '', 'trim|required|min_length[4]|max_length[200]');

            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|exact_length[14]|is_unique[vendedores.vendedor_cpf]|callback_valida_cpf');
            $this->form_validation->set_rules('vendedor_rg', '', 'trim|max_length[20]|is_unique[vendedores.vendedor_rg]');
            $this->form_validation->set_rules('vendedor_email', '', 'trim|valid_email|max_length[45]|is_unique[vendedores.vendedor_email]');
            $this->form_validation->set_rules('vendedor_telefone', '', 'trim|required|max_length[14]|is_unique[vendedores.vendedor_telefone]');
            $this->form_validation->set_rules('vendedor_celular', '', 'trim|required|max_length[15]|is_unique[vendedores.vendedor_celular]');
            
            $this->form_validation->set_rules('vendedor_CEP', '', 'trim|exact_length[9]');
            $this->form_validation->set_rules('vendedor_endereco', '', 'trim|max_length[155]');
            $this->form_validation->set_rules('vendedor_numero_endereco', '', 'trim|max_length[20]');
            $this->form_validation->set_rules('vendedor_bairro', '', 'trim|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('vendedor_cidade', '', 'trim|max_length[50]');
            $this->form_validation->set_rules('vendedor_estado', '', 'trim|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs', '', 'max_length[500]');
                
                
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'vendedor_codigo',
                            'vendedor_nome_completo',
                            'vendedor_cpf',
                            'vendedor_rg',
                            'vendedor_email',
                            'vendedor_telefone',
                            'vendedor_celular',
                            'vendedor_endereco',
                            'vendedor_numero_endereco',
                            'vendedor_complemento',
                            'vendedor_bairro',
                            'vendedor_cidade',
                            'vendedor_cep',
                            'vendedor_estado',
                            'vendedor_ativo',
                            'vendedor_obs',
                        ), $this->input->post()
                );

                $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));

                $data = html_escape($data);
                
                $this->Rinos_bikes->insert('vendedores', $data);

                redirect('vendedores');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Cadastrar Vendedor',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                'vendedor_codigo'  => $this->Rinos_bikes->generate_unique_code('vendedores', 'numeric', 8, 'vendedor_codigo'),
                    
                    
            );
            
//            echo '<pre>';
//            print_r($data['vendedores']);
//            exit();
 
 
            $this->load->view('layout/header', $data);
            $this->load->view('vendedores/add');
            $this->load->view('layout/footer');
            

        }

    }   
    
        public function edit($vendedor_id = NULL) {
        
            if(!$vendedor_id || !$this->Rinos_bikes->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){
                $this->session->set_flashdata('error', 'Vendedor Não Encontrado');
                redirect('vendedores');
            }else{
                            

            $this->form_validation->set_rules('vendedor_nome_completo', '', 'trim|required|min_length[4]|max_length[200]');

            $this->form_validation->set_rules('vendedor_cpf', '', 'trim|exact_length[14]|callback_valida_cpf');
            
            $this->form_validation->set_rules('vendedor_rg', '', 'trim|max_length[20]|callback_check_vendedor_rg');
            $this->form_validation->set_rules('vendedor_email', '', 'trim|valid_email|max_length[45]|callback_check_vendedor_email');
            $this->form_validation->set_rules('vendedor_telefone', '', 'trim|required|max_length[14]|callback_check_vendedor_telefone');
            $this->form_validation->set_rules('vendedor_celular', '', 'trim|required|max_length[15]|callback_check_vendedor_celular');
            
            $this->form_validation->set_rules('vendedor_CEP', '', 'trim|exact_length[9]');
            $this->form_validation->set_rules('vendedor_endereco', '', 'trim|max_length[155]');
            $this->form_validation->set_rules('vendedor_numero_endereco', '', 'trim|max_length[20]');
            $this->form_validation->set_rules('vendedor_bairro', '', 'trim|max_length[45]');
            $this->form_validation->set_rules('vendedor_complemento', '', 'trim|max_length[145]');
            $this->form_validation->set_rules('vendedor_cidade', '', 'trim|max_length[50]');
            $this->form_validation->set_rules('vendedor_estado', '', 'trim|exact_length[2]');
            $this->form_validation->set_rules('vendedor_obs', '', 'max_length[500]');
                
                
            if($this->form_validation->run()){
                             
                
                $data = elements(
                        array(
                            'vendedor_codigo',
                            'vendedor_nome_completo',
                            'vendedor_cpf',
                            'vendedor_rg',
                            'vendedor_email',
                            'vendedor_telefone',
                            'vendedor_celular',
                            'vendedor_endereco',
                            'vendedor_numero_endereco',
                            'vendedor_complemento',
                            'vendedor_bairro',
                            'vendedor_cidade',
                            'vendedor_cep',
                            'vendedor_estado',
                            'vendedor_ativo',
                            'vendedor_obs',
                        ), $this->input->post()
                );

                $data['vendedor_estado'] = strtoupper($this->input->post('vendedor_estado'));

                $data = html_escape($data);
                
                $this->Rinos_bikes->update('vendedores', $data, array('vendedor_id' => $vendedor_id));

                redirect('vendedores');

                } else {
            
                
                //Erro de Validação
                
                $data = array (
            
               'titulo' => 'Atualizar Vendedor',
            
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                
                'vendedor' => $this->Rinos_bikes->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),
            );
            
//            echo '<pre>';
//            print_r($data['vendedores']);
//            exit();
 
 
            $this->load->view('layout/header', $data);
            $this->load->view('vendedores/edit');
            $this->load->view('layout/footer');
            }

        }

    }
        
        public function check_vendedor_rg($vendedor_rg) {
            
            $vendedor_id = $this->input->post('vendedor_id');
            
            if($this->Rinos_bikes->get_by_id('vendedores', array('vendedor_rg' => $vendedor_rg, 'vendedor_id !=' => $vendedor_id))){
                $this->form_validation->set_message('check_vendedor_rg', 'Esta Inscrição Estadual já Exsiste!');
                return FALSE;
            }else{
                return TRUE;
                        
        }
            
    }
    
        public function check_vendedor_email($vendedor_email) {
            
            $vendedor_id = $this->input->post('vendedor_id');
            
            if($this->Rinos_bikes->get_by_id('vendedores', array('vendedor_email' => $vendedor_email, 'vendedor_id !=' => $vendedor_id))){
                $this->form_validation->set_message('check_vendedor_email', 'Esse E-mail Já Existe');
                return FALSE;
            }else{
                return TRUE;
                        
        }
            
    }
    
        public function check_vendedor_telefone($vendedor_telefone) {
            
            $vendedor_id = $this->input->post('vendedor_id');
            
            if($this->Rinos_bikes->get_by_id('vendedores', array('vendedor_telefone' => $vendedor_telefone, 'vendedor_id !=' => $vendedor_id))){
                $this->form_validation->set_message('check_vendedor_telefone', 'Esse Telefone Já Existe');
                return FALSE;
            }else{
                return TRUE;
                        
        }
            
    }
    
        public function check_vendedor_celular($vendedor_celular) {
            
            $vendedor_id = $this->input->post('vendedor_id');
            
            if($this->Rinos_bikes->get_by_id('vendedores', array('vendedor_celular' => $vendedor_celular, 'vendedor_id !=' => $vendedor_id))){
                $this->form_validation->set_message('check_vendedor_celular', 'Esse Celular Já Existe');
                return FALSE;
            }else{
                return TRUE;
                        
        }
         
    }
    
        public function valida_cpf($cpf) {

        if ($this->input->post('vendedor_id')) {

            $vendedor_id = $this->input->post('vendedor_id');

            if ($this->Rinos_bikes->get_by_id('vendedores', array('vendedor_id !=' => $vendedor_id, 'vendedor_cpf' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'Este CPF já existe');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {

                    $d += $cpf[$c] * (($t + 1) - $c); 
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }
       
        public function del($vendedor_id = NULL) {
            
        if(!$vendedor_id || !$this->Rinos_bikes->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))){
            $this->session->set_flashdata('error', 'Fornecedor Não Encontrado');
            redirect('vendedores');
        }else{
            
            $this->Rinos_bikes->delete('vendedores', array('vendedor_id' => $vendedor_id));
            redirect('vendedores');
        }
    }
    
    }