<?php

class Serie extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('seriemodel');
    }

    public function apagar($id) {
        $this->seriemodel->apagar($id);
        $this->session->set_flashdata('success', '<b>Apagado com sucesso!</b>');
        redirect('index.php/serie/');
    }

    public function editar($id) {

        $serie = $this->seriemodel->abrir($id);

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->seriemodel->alterar($id);
            $this->session->set_flashdata('success', '<b>Alterado com sucesso!</b>');
            redirect('index.php/serie/editar/' . $id);
        }
        $this->load->view('serie/editar', array('serie' => $serie));
    }

    public function nova() {

        $this->form_validation->set_rules('nome', 'Nome', 'max_length[200]|required|is_unique[serie.nome]');

        $this->form_validation->set_error_delimiters('<li><strong>', '</strong></li>');
        if ($this->form_validation->run() == TRUE) {
            $this->seriemodel->inserir();
            $this->session->set_flashdata('success', '<b>Cadastrado com sucesso!</b>');
            redirect('index.php/serie/nova/');
        }
        $this->load->view('serie/nova');
    }

    public function index() {
        $series = $this->seriemodel->listar();
        $this->load->view('serie/index', array('series' => $series));
    }

}
