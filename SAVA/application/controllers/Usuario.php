<?php

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuariomodel');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('index.php/usuario/login/');
    }

    public function pagina() {
        $this->load->view('pagina');
    }

    public function primeiroacesso() {

        $this->form_validation->set_rules('email', 'Email', 'max_length[200]|valid_email|required');
        $this->form_validation->set_rules('senha', 'Senha', 'min_length[3]|max_length[15]|required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->usuariomodel->inserirAdmin();
            $usuario = $this->usuariomodel->abrirPorEmail($_POST['email']);
            $this->session->set_userdata('usuario', $usuario);
            redirect('index.php/usuario/pagina/');
        }
        $this->load->view('usuario/primeiroacesso');
    }

    public function login() {
        if ($this->usuariomodel->primeiroacesso() == null) {
            redirect('index.php/usuario/primeiroacesso/');
        }
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $usuario = $this->usuariomodel->abrirPorEmailSenha($_POST['email'], $_POST['senha']);
            if ($usuario == null) {
                $this->session->set_flashdata('error', '<b>Dados inválidos!</b>');
            } else {
                $this->session->set_userdata('usuario', $usuario);
                redirect('index.php/usuario/pagina/');
            }
        }
        $this->load->view('usuario/login');
    }

}
