<?php $this->load->view('header'); ?>
<?php echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success')); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="5" width="100" style="text-align: center; font-size: 25px"><?php echo $disciplina->nome; ?></th>
        </tr>
        <?php foreach ($professores as $professor) { ?>
            <tr>
                <th colspan="5" width="100" style="text-align: center; font-size: 20px"><?php echo $professor->nome; ?></th>
            </tr>
            <tr>
                <th width="50" style="vertical-align: top">PONTUALIDADE: <?php echo $professor->avaliacao->pontualidade; ?></th>
                <th width="50" style="vertical-align: top">ASSIDUIDADE: <?php echo $professor->avaliacao->assiduidade; ?></th>
                <th width="50" style="vertical-align: top">ORGANIZAÇÃO: <?php echo $professor->avaliacao->organizacao; ?></th>
                <th width="50" style="vertical-align: top">DISCIPLINA: <?php echo $professor->avaliacao->disciplina; ?></th>
                <th width="50" style="vertical-align: top">RELACIONAMENTO: <?php echo $professor->avaliacao->relacionamento; ?></th>
            </tr>
            <tr>
                <th width="50" style="vertical-align: top">METODOLOGIA: <?php echo $professor->avaliacao->metodologia; ?></th>
                <th width="50" style="vertical-align: top">AVALIAÇÃO: <?php echo $professor->avaliacao->avaliacao; ?></th>
                <th width="50" style="vertical-align: top">DESENVOLVIMENTO P.: <?php echo $professor->avaliacao->desenvolvimento; ?></th>
                <th width="50" style="vertical-align: top">COMPROMISSO I.: <?php echo $professor->avaliacao->compromisso; ?></th>
                <th width="50" style="vertical-align: top">ÉTICA: <?php echo $professor->avaliacao->etica; ?></th>
            </tr>
            <tr>
                <th colspan="5">Total: <?php echo $professor->avaliacao->total; ?></th>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="5" width="100" height="40" style="font-size: 20px; vertical-align: bottom">Total: <?php echo $total; ?></th>
        </tr>
    </thead>
</table>
<?php $this->load->view('footer'); ?>