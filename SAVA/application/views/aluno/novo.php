<?php

$this->load->view('header');
echo form_open("index.php/aluno/novo");
echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success'));
echo MSG::getAlertMensagemClose(MSG::ALERT_DANGER, validation_errors());
echo "<h2 class='form-signin-heading'>NOVO ALUNO</h2>";
echo "<div class='form-group'>";
echo form_label('Nome', 'nome');
echo form_input(array('type' => 'text', 'id' => 'nome', 'name' => 'nome', 'class' => 'form-control', 'placeholder' => 'DIGITE O NOME', 'autofocus' => true), set_value('nome'));
echo "</div>";
echo "<div class='form-group'>";
echo form_label('Email', 'email');
echo form_input(array('type' => 'text', 'id' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'DIGITE O EMAIL'), set_value('email'));
echo "</div>";
echo "<div class='form-group'>";
echo form_label('Senha', 'senha');
echo form_input(array('type' => 'password', 'id' => 'senha', 'name' => 'senha', 'class' => 'form-control', 'placeholder' => 'DIGITE A SENHA'));
echo "</div>";
echo form_button(array("class" => "btn btn-primary", "content" => "CADASTRAR", "type" => "submit"));
echo anchor('index.php/aluno/', 'Voltar', array('class' => 'btn btn-info'));
echo form_close();
$this->load->view('footer');
?>
