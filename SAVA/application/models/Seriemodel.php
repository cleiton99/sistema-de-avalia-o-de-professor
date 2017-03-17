<?php

class Seriemodel extends CI_Model {

    public function apagar($id) {
        $this->db->where('id', $id)->delete('serie');
    }

    public function alterar($id) {
        $dados = $_POST;
        $this->db->where('id', $id)->update('serie', $dados);
    }

    public function abrir($id) {
        return $this->db->where('id', $id)->get('serie')->row_object();
    }

    public function inserir() {
        $dados = $_POST;
        $this->db->insert('serie', $dados);
    }

    public function listar() {
        return $this->db->order_by('nome', 'ASC')->get('serie')->result_object();
    }

}
