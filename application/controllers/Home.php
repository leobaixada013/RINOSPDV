<?php

defined ('BASEPATH') or exit ('Ação Não Permitida, Contate Leonardo Souza');

class Home extends CI_Controller {
       
    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua Sessão Expirou!');
            redirect('login');
        } 
    }
        
        public function index() {
           
            
            $this->load->view('layout/header');
            $this->load->view('home/index');
            $this->load->view('layout/footer');
        }
        
}
    
    
