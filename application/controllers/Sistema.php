    <?php
     
defined ('BASEPATH') or exit ('Ação não permitida, Contate Leonardo Souza');

    class Sistema extends CI_Controller{
     
        public function __construct() {
            parent::__construct();
     
            if (!$this->ion_auth->logged_in()){
                $this->session->set_flashdata('info', 'Sua Sessão Expirou!');
                redirect('login');
            }
        }
     
        public function index() {
            
            $data = array(
                'titulo' => 'Editar Informações do Sistema',
                
                'scripts' => array(
                   'vendor/mask/jquery.mask.min.js',
                   'vendor/mask/app.js',
                ),
                
                'sistema' => $this->Rinos_bikes->get_by_id('sistema', array('sistema_id' => 1)),
            );
     
            
     
            $this->form_validation->set_rules('sistema_razao_social', 'razão social', 'required|min_length[4]|max_length[145]');
            $this->form_validation->set_rules('sistema_nome_fantasia', 'nome fantasia', 'required|min_length[4]|max_length[145]');
            $this->form_validation->set_rules('sistema_cnpj', '', 'required|exact_length[18]');
            $this->form_validation->set_rules('sistema_ie', 'inscrição estadual', 'required|max_length[25]');
            $this->form_validation->set_rules('sistema_telefone_fixo', '', 'required|max_length[25]');
            $this->form_validation->set_rules('sistema_telefone_movel', '', 'required|max_length[25]');
            $this->form_validation->set_rules('sistema_email', '', 'required|valid_email|max_length[100]');
            $this->form_validation->set_rules('sistema_site_url', 'url do site', 'required|valid_url|max_length[100]');
            $this->form_validation->set_rules('sistema_cep', 'cep', 'required|exact_length[9]');
            $this->form_validation->set_rules('sistema_endereco', 'endereço', 'required|max_length[145]');
            $this->form_validation->set_rules('sistema_numero', 'número', 'max_length[25]');
            $this->form_validation->set_rules('sistema_cidade', 'cidade', 'required|max_length[45]');
            $this->form_validation->set_rules('sistema_estado', 'uf', 'required|exact_length[2]');
            $this->form_validation->set_rules('sistema_txt_ordem_servico', 'texto da ordem de serviço e venda', 'max_length[500]');
            
            if ($this->form_validation->run()) {
                
                /*
    [sistema_razao_social] => Auto Ciclo Batalha ®
    [sistema_nome_fantasia] => Rino's Bikes ®
    [sistema_cnpj] => 123456789123456789
    [sistema_ie] => 505.097.540.273
    [sistema_telefone_fixo] => (13) 3561-1900
    [sistema_telefone_movel] => (13) 99687-8447
    [sistema_site_url] => https://rinosbikes.com
    [sistema_email] => rinos.bikes@gmail.com
    [sistema_endereco] => Avenida Prefeito José Monteiro
    [sistema_cep] => 11380-001
    [sistema_numero] => 513
    [sistema_cidade] => São Vicente
    [sistema_estado] => SP
    [sistema_txt_ordem_servico] =>  
                */
     
                $data = elements(
                    array(
                    'sistema_razao_social',
                    'sistema_nome_fantasia',
                    'sistema_cnpj',
                    'sistema_ie',
                    'sistema_telefone_fixo',
                    'sistema_telefone_movel',
                    'sistema_site_url',
                    'sistema_email',
                    'sistema_endereco',
                    'sistema_cep',
                    'sistema_numero',
                    'sistema_cidade',
                    'sistema_estado',
                    'sistema_txt_ordem_servico',
                    ), $this->input->post()
                );
                
                $data = html_escape($data);
                
                // echo '<pre>';
                // print_r($this->input->post());
                // exit();
     
                $this->Rinos_bikes->update('sistema', $data, array('sistema_id' => 1));
     
                redirect('sistema');
                
     
            }else {
                
                
     
                $this->load->view('layout/header', $data);
                $this->load->view('sistema/index');
                $this->load->view('layout/footer');
            }
            
     
            
        }
     
    }