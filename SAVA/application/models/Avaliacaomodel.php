<?php

class Avaliacaomodel extends CI_Model {

    public function apagar($professor) {
        $this->db->where('professor', $professor)->delete('avaliacao');
    }

    public function alterar($professor) {
        $dados = $_POST;
        $this->db->where('professor', $professor)->update('avaliacao', $dados);
    }

    public function listaPorSerie($serie) {
        return $this->db
                        ->select('professor.id, professor.nome, professor.disciplina, professor.serie')
                        ->from('professor')
                        ->join('serie', 'serie.id = professor.serie')
                        ->where('serie.id', $serie)
                        ->get()
                        ->result_object();
    }

    public function listaPorDisciplina($disciplina) {
        return $this->db
                        ->select('professor.id, professor.nome, professor.disciplina, professor.serie')
                        ->from('professor')
                        ->join('disciplina', 'disciplina.id = professor.disciplina')
                        ->where('disciplina.id', $disciplina)
                        ->get()
                        ->result_object();
    }

    public function abrir($professor) {
        return $this->db->where('professor', $professor)->get('avaliacao')->row_object();
    }

    public function inserir($professor) {
        $dados = $_POST;
        $dados['professor'] = $professor;
        $dados['aluno'] = $this->db->where('usuario', $this->session->userdata('usuario')->id)->get('aluno')->row_object()->id;
        $this->db->insert('avaliacao', $dados);
    }

    public function verificar($professor) {
        return $this->db->where('professor', $professor)->get('avaliacao')->result_object();
    }

}
