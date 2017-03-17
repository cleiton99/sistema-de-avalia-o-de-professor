<?php

$this->load->view('header');
echo form_open("index.php/serie/nova");
echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success'));
echo MSG::getAlertMensagemClose(MSG::ALERT_DANGER, validation_errors());
echo "<h2 class='form-signin-heading'>NOVA SÉRIE</h2>";
echo "<div class='form-group'>";
echo form_label('Nome', 'nome');
echo form_input(array('type' => 'text', 'id' => 'nome', 'name' => 'nome', 'class' => 'form-control', 'placeholder' => 'DIGITE O NOME', 'autofocus' => true), set_value('nome'));
echo "</div>";
echo form_button(array("class" => "btn btn-primary", "content" => "CADASTRAR", "type" => "submit"));
echo anchor('index.php/serie/', 'Voltar', array('class' => 'btn btn-info'));
echo form_close();
$this->load->view('footer');
?>
