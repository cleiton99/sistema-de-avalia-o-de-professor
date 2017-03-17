<?php

class Professormodel extends CI_Model {

    public function apagar($id) {
        $this->db->where('id', $id)->delete('professor');
    }

    public function alterar($id) {
        $dados = $_POST;
        $this->db->where('id', $id)->update('professor', $dados);
    }

    public function abrir($id) {
        return $this->db->where('id', $id)->get('professor')->row_object();
    }

    public function inserir() {
        $dados = $_POST;
        $this->db->insert('professor', $dados);
    }

    public function listar() {
        $lista = $this->db->order_by('nome', 'ASC')->get('professor')->result_object();
        foreach ($lista as $professor){
            $professor->disciplina = $this->db->where('id', $professor->disciplina)->get('disciplina')->row_object();
            $professor->serie = $this->db->where('id', $professor->serie)->get('serie')->row_object();
        }
        return $lista;
    }

}
