<?php

class Avaliacao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('avaliacaomodel', 'professormodel'));
    }

    public function apagar($id) {
        $this->avaliacaomodel->apagar($id);
        $this->session->set_flashdata('success', '<b>Apagado com sucesso!</b>');
        redirect('index.php/avaliacao/nova/'.$id);
    }

    public function editar($professor) {

        $avaliacao = $this->avaliacaomodel->abrir($professor);
        $avaliacao->professor = $this->professormodel->abrir($avaliacao->professor);

        $this->form_validation->set_rules('pontualidade', 'Pontualidade', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('assiduidade', 'Assiduidade', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('organizacao', 'Organização', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('disciplina', 'Disciplina', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('relacionamento', 'Relacionamento', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('metodologia', 'Metodologia', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('avaliacao', 'Avaliação', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('desenvolvimento', 'Desenvolvimento Profissional', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('compromisso', 'Compromisso Institucional', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('etica', 'Ética', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');


        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->avaliacaomodel->alterar($professor);
            $this->session->set_flashdata('success', '<b>Alterado com sucesso!</b>');
            redirect('index.php/avaliacao/editar/' . $professor);
        }
        $this->load->view('avaliacao/editar', array('avaliacao' => $avaliacao));
    }

    public function nova($professor) {

        $dados = $this->professormodel->abrir($professor);

        $this->form_validation->set_rules('pontualidade', 'Pontualidade', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('assiduidade', 'Assiduidade', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('organizacao', 'Organização', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('disciplina', 'Disciplina', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('relacionamento', 'Relacionamento', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('metodologia', 'Metodologia', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('avaliacao', 'Avaliação', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('desenvolvimento', 'Desenvolvimento Profissional', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('compromisso', 'Compromisso Institucional', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');
        $this->form_validation->set_rules('etica', 'Ética', 'greater_than_equal_to[0]|less_than_equal_to[5]|required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->avaliacaomodel->inserir($professor);
            $this->session->set_flashdata('success', '<b>Cadastrado com sucesso!</b>');
            redirect('index.php/avaliacao/editar/' . $professor);
        }
        $this->load->view('avaliacao/nova', array('professor' => $dados));
    }

    public function verificar($professor) {
        if ($this->avaliacaomodel->verificar($professor) == NULL) {
            redirect('index.php/avaliacao/nova/' . $professor);
        } else {
            redirect('index.php/avaliacao/editar/' . $professor);
        }
    }

    public function index() {
        $professores = $this->professormodel->listar();
        $this->load->view('avaliacao/index', array('professores' => $professores));
    }

}
