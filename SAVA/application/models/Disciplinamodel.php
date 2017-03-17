<?php

class Disciplinamodel extends CI_Model {

    public function apagar($id) {
        $this->db->where('id', $id)->delete('disciplina');
    }

    public function alterar($id) {
        $dados = $_POST;
        $this->db->where('id', $id)->update('disciplina', $dados);
    }

    public function abrir($id) {
        return $this->db->where('id', $id)->get('disciplina')->row_object();
    }

    public function inserir() {
        $dados = $_POST;
        $this->db->insert('disciplina', $dados);
    }

    public function listar() {
        return $this->db->order_by('nome', 'ASC')->get('disciplina')->result_object();
    }

}
