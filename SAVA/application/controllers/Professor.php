<?php

class Professor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('professormodel', 'disciplinamodel', 'seriemodel'));
    }

    public function apagar($id) {
        $this->professormodel->apagar($id);
        $this->session->set_flashdata('success', '<b>Apagado com sucesso!</b>');
        redirect('index.php/professor/');
    }

    public function editar($id) {

        $professor = $this->professormodel->abrir($id);

        $disciplinas = array();
        $disciplinas[""] = "";
        foreach ($this->disciplinamodel->listar() as $disciplina) {
            $disciplinas[$disciplina->id] = $disciplina->nome;
        }

        $series = array();
        $series[""] = "";
        foreach ($this->seriemodel->listar() as $serie) {
            $series[$serie->id] = $serie->nome;
        }

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required');
        $this->form_validation->set_rules('disciplina', 'Disciplina', 'required');
        $this->form_validation->set_rules('serie', 'Série', 'required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->professormodel->alterar($id);
            $this->session->set_flashdata('success', '<b>Alterado com sucesso!</b>');
            redirect('index.php/professor/editar/' . $id);
        }
        $this->load->view('professor/editar', array('professor' => $professor, 'disciplinas' => $disciplinas, 'series' => $series));
    }

    public function novo() {

        $disciplinas = array();
        $disciplinas[""] = "";
        foreach ($this->disciplinamodel->listar() as $disciplina) {
            $disciplinas[$disciplina->id] = $disciplina->nome;
        }

        $series = array();
        $series[""] = "";
        foreach ($this->seriemodel->listar() as $serie) {
            $series[$serie->id] = $serie->nome;
        }

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required|is_unique[professor.nome]');
        $this->form_validation->set_rules('disciplina', 'Disciplina', 'required');
        $this->form_validation->set_rules('serie', 'Série', 'required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->professormodel->inserir();
            $this->session->set_flashdata('success', '<b>Cadastrado com sucesso!</b>');
            redirect('index.php/professor/novo/');
        }
        $this->load->view('professor/novo', array('disciplinas' => $disciplinas, 'series' => $series));
    }

    public function index() {
        $professores = $this->professormodel->listar();
        $this->load->view('professor/index', array('professores' => $professores));
    }

}
