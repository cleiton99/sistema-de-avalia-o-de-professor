<?php

class Usuariomodel extends CI_Model {

    public function abrir($id) {
        return $this->db->where('id', $id)->get('usuario')->row_object();
    }

    public function abrirPorEmailSenha($email, $senha) {
        return $this->db->where('email', $email)->where('senha', sha1($senha))->get('usuario')->row_object();
    }

    public function abrirPorEmail($email) {
        return $this->db->where('email', $email)->get('usuario')->row_object();
    }

    public function inserirAdmin() {
        $dados = $_POST;
        $dados['senha'] = sha1($_POST['senha']);
        $dados['nivel'] = 'ADMINISTRADOR';
        $this->db->insert('usuario', $dados);
    }

    public function primeiroacesso() {
        return $this->db->get('usuario')->row_object();
    }

}
