<?php

class Relatorio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('avaliacaomodel', 'professormodel', 'disciplinamodel', 'seriemodel'));
    }

    public function serie($serie = NULL) {
        if ($serie != NULL) {
            $dados = $this->seriemodel->abrir($serie);
            $professores = $this->avaliacaomodel->listaPorSerie($serie);

            $qtd = 0;
            $total = 0;
            foreach ($professores as $professor) {
                $avaliacao = $this->avaliacaomodel->abrir($professor->id);
                $avaliacao->total = ($avaliacao->pontualidade + $avaliacao->assiduidade + $avaliacao->organizacao + $avaliacao->disciplina + $avaliacao->relacionamento + $avaliacao->metodologia + $avaliacao->avaliacao + $avaliacao->desenvolvimento + $avaliacao->compromisso + $avaliacao->etica) / 5;
                $professor->avaliacao = $avaliacao;
                $total += $avaliacao->total;
                $qtd++;
            }

            $total = $total / $qtd;

            $mpdf = new mPDF('c', 'A4-L');

            $html = $this->load->view('relatorio/disciplinaPDF', array('professores' => $professores, 'disciplina' => $dados, 'total' => $total), TRUE);

            $mpdf->SetHeader('Avaliação por série');

            $mpdf->WriteHTML($html);

            $mpdf->Output();
        }
        $series = $this->seriemodel->listar();
        $this->load->view('relatorio/serie', array('series' => $series));
    }

    public function disciplina($disciplina = NULL) {
        if ($disciplina != NULL) {
            $dados = $this->disciplinamodel->abrir($disciplina);
            $professores = $this->avaliacaomodel->listaPorDisciplina($disciplina);

            $qtd = 0;
            $total = 0;
            foreach ($professores as $professor) {
                $avaliacao = $this->avaliacaomodel->abrir($professor->id);
                $avaliacao->total = ($avaliacao->pontualidade + $avaliacao->assiduidade + $avaliacao->organizacao + $avaliacao->disciplina + $avaliacao->relacionamento + $avaliacao->metodologia + $avaliacao->avaliacao + $avaliacao->desenvolvimento + $avaliacao->compromisso + $avaliacao->etica) / 5;
                $professor->avaliacao = $avaliacao;
                $total += $avaliacao->total;
                $qtd++;
            }

            $total = $total / $qtd;

            $mpdf = new mPDF('c', 'A4-L');

            $html = $this->load->view('relatorio/disciplinaPDF', array('professores' => $professores, 'disciplina' => $dados, 'total' => $total), TRUE);

            $mpdf->SetHeader('Avaliação por disciplina');

            $mpdf->WriteHTML($html);

            $mpdf->Output();
        }
        $disciplinas = $this->disciplinamodel->listar();
        $this->load->view('relatorio/disciplina', array('disciplinas' => $disciplinas));
    }

    public function professor($professor = NULL) {
        if ($professor != NULL) {
            $avaliacao = $this->avaliacaomodel->abrir($professor);
            $avaliacao->professor = $this->professormodel->abrir($professor);
            $avaliacao->total = ($avaliacao->pontualidade + $avaliacao->assiduidade + $avaliacao->organizacao + $avaliacao->disciplina + $avaliacao->relacionamento + $avaliacao->metodologia + $avaliacao->avaliacao + $avaliacao->desenvolvimento + $avaliacao->compromisso + $avaliacao->etica) / 5;

            $mpdf = new mPDF('c', 'A4-L');

            $html = $this->load->view('relatorio/professorPDF', array('avaliacao' => $avaliacao), TRUE);

            $mpdf->SetHeader('Avaliação por professor');

            $mpdf->WriteHTML($html);

            $mpdf->Output();
        }
        $professores = $this->professormodel->listar();
        $this->load->view('relatorio/professor', array('professores' => $professores));
    }

}
