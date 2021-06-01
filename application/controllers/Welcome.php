<?php
defined ('BASEPATH') or exit ('Ação não permitida, Contate Leonardo Souza');

class welcome extends CI_Controller {

	public function index() {
		$this->load->view('welcome_message');
	}
        
        public function chamou () {
            
            echo 'Você chamou a função chamou ()' ;
        
            
        }
        
}
