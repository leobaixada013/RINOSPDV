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
            'vendedores' => $this->Rinos_bikes->get_all('servicos'),
            );
//            echo '<pre>';
//            print_r($data['serviços']);
//            exit();
        
            $this->load->view('layout/header', $data);
            $this->load->view('servicos/index');
            $this->load->view('layout/footer');
        
    }
    
}