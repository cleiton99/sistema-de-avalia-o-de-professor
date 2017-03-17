<?php

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('alunomodel', 'usuariomodel'));
    }

    public function apagar($id) {
        $this->alunomodel->apagar($id);
        $this->session->set_flashdata('success', '<b>Apagado com sucesso!</b>');
        redirect('index.php/aluno/');
    }

    public function editar($id) {

        $aluno = $this->alunomodel->abrir($id);
        $aluno->usuario = $this->usuariomodel->abrir($aluno->usuario);

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required');
        $this->form_validation->set_rules('email', 'Email', 'max_length[200]|valid_email|required');
        $this->form_validation->set_rules('senha', 'Senha', 'min_length[3]|max_length[15]|required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->alunomodel->alterar($id);
            $this->session->set_flashdata('success', '<b>Alterado com sucesso!</b>');
            redirect('index.php/aluno/editar/' . $id);
        }
        $this->load->view('aluno/editar', array('aluno' => $aluno));
    }

    public function novo() {

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required|is_unique[aluno.nome]');
        $this->form_validation->set_rules('email', 'Email', 'max_length[200]|valid_email|required|is_unique[usuario.email]');
        $this->form_validation->set_rules('senha', 'Senha', 'min_length[3]|max_length[15]|required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->alunomodel->inserir();
            $this->session->set_flashdata('success', '<b>Cadastrado com sucesso!</b>');
            redirect('index.php/aluno/novo/');
        }
        $this->load->view('aluno/novo');
    }

    public function index() {
        $alunos = $this->alunomodel->listar();
        foreach ($alunos as $aluno) {
            $aluno->email = $this->usuariomodel->abrir($aluno->usuario)->email;
        }
        $this->load->view('aluno/index', array('alunos' => $alunos));
    }

}
