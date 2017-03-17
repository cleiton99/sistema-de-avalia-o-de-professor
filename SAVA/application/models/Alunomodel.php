<?php

class Alunomodel extends CI_Model {

    public function apagar($id) {
        $aluno = $this->db->where('id', $id)->get('aluno')->row_object();
        $this->db->where('id', $id)->delete('aluno');
        $this->db->where('id', $aluno->usuario)->delete('usuario');
    }

    public function alterar($id) {
        $dados['nome'] = $_POST['nome'];
        $this->db->where('id', $id)->update('aluno', $dados);
        $aluno = $this->db->where('id', $id)->get('aluno')->row_object();
        $dados2['email'] = $_POST['email'];
        $dados2['senha'] = sha1($_POST['senha']);
        $this->db->where('id', $aluno->usuario)->update('usuario', $dados2);
    }

    public function abrir($id) {
        return $this->db->where('id', $id)->get('aluno')->row_object();
    }

    public function inserir() {
        $dados['email'] = $_POST['email'];
        $dados['senha'] = sha1($_POST['senha']);
        $dados['nivel'] = 'ALUNO';
        $this->db->insert('usuario', $dados);
        $usuario = $this->db->where('email', $_POST['email'])->get('usuario')->row_object();
        $dados2['nome'] = $_POST['nome'];
        $dados2['usuario'] = $usuario->id;
        $this->db->insert('aluno', $dados2);
    }

    public function listar() {
        return $this->db->order_by('nome', 'ASC')->get('aluno')->result_object();
    }

}
