<?php

class Disciplina extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('disciplinamodel');
    }

    public function apagar($id) {
        $this->disciplinamodel->apagar($id);
        $this->session->set_flashdata('success', '<b>Apagado com sucesso!</b>');
        redirect('index.php/disciplina/');
    }

    public function editar($id) {

        $disciplina = $this->disciplinamodel->abrir($id);

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->disciplinamodel->alterar($id);
            $this->session->set_flashdata('success', '<b>Alterado com sucesso!</b>');
            redirect('index.php/disciplina/editar/' . $id);
        }
        $this->load->view('disciplina/editar', array('disciplina' => $disciplina));
    }

    public function nova() {

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required|is_unique[disciplina.nome]');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->disciplinamodel->inserir();
            $this->session->set_flashdata('success', '<b>Cadastrado com sucesso!</b>');
            redirect('index.php/disciplina/nova/');
        }
        $this->load->view('disciplina/nova');
    }

    public function index() {
        $disciplinas = $this->disciplinamodel->listar();
        $this->load->view('disciplina/index', array('disciplinas' => $disciplinas));
    }

}
