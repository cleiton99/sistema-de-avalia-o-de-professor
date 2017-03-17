<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SAVA</title>

        <link href="<?php echo base_url("/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("/css/ie10-viewport-bug-workaround.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("/css/signin.css"); ?>" rel="stylesheet">

        <script src="<?php echo base_url("/js/ie-emulation-modes-warning.js"); ?>"></script>

    </head>

    <body>

        <div class="container">

            <?php
            echo form_open("index.php/usuario/login", array('class' => 'form-signin'));
            echo MSG::getAlertMensagemClose(MSG::ALERT_DANGER, $this->session->flashdata('error'));
            echo MSG::getAlertMensagemClose(MSG::ALERT_DANGER, validation_errors());
            echo "<h2 class='form-signin-heading'>SAVA - LOGIN</h2>";
            echo form_label('Email', 'email', array('class' => 'sr-only'));
            echo form_input(array('type' => 'text', 'id' => 'email', 'name' => 'email', 'class' => 'form-control', 'placeholder' => 'DIGITE O EMAIL', 'autofocus' => true), set_value('email'));
            echo form_label('Senha', 'senha', array('class' => 'sr-only'));
            echo form_input(array('type' => 'password', 'id' => 'senha', 'name' => 'senha', 'class' => 'form-control', 'placeholder' => 'DIGITE A SENHA'));
            echo form_button(array("class" => "btn btn-lg btn-primary btn-block", "content" => "ENTRAR", "type" => "submit"));
            echo form_close();
            ?>

        </div> <!-- /container -->


        <script src="<?php echo base_url("/js/ie10-viewport-bug-workaround.js"); ?>"></script>
    </body>
</html>
