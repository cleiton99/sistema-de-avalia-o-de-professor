<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SAVA</title>

        <link href="<?php echo base_url("/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("/css/ie10-viewport-bug-workaround.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("/css/navbar-fixed-top.css"); ?>" rel="stylesheet">

        <script src="<?php echo base_url("/js/ie-emulation-modes-warning.js"); ?>"></script>

    </head>

    <body>

        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url('index.php/usuario/pagina/'); ?>">ÍNICIO</a></li>
                        <?php if ($this->session->userdata('usuario')->nivel == "ADMINISTRADOR") { ?>
                            <li><a href="<?php echo base_url('index.php/disciplina/'); ?>">DISCIPLINA</a></li>
                            <li><a href="<?php echo base_url('index.php/serie/'); ?>">SÉRIE</a></li>
                            <li><a href="<?php echo base_url('index.php/aluno/'); ?>">ALUNO</a></li>
                            <li><a href="<?php echo base_url('index.php/professor/'); ?>">PROFESSOR</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo base_url('index.php/avaliacao/'); ?>">AVALIAÇÃO</a></li>
                        <?php } ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">RELATÓRIO <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('index.php/relatorio/professor'); ?>">PROFESSOR</a></li>
                                <li><a href="<?php echo base_url('index.php/relatorio/disciplina'); ?>">DISCIPLINA</a></li>
                                <li><a href="<?php echo base_url('index.php/relatorio/serie'); ?>">SÉRIE</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo base_url('index.php/usuario/logout'); ?>">SAIR</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">