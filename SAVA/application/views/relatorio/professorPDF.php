<?php $this->load->view('header'); ?>
<?php echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success')); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="5" width="100" style="text-align: center; font-size: 20px"><?php echo $avaliacao->professor->nome; ?></th>
        </tr>
        <tr>
            <th width="50" style="vertical-align: top">PONTUALIDADE: <?php echo $avaliacao->pontualidade; ?></th>
            <th width="50" style="vertical-align: top">ASSIDUIDADE: <?php echo $avaliacao->assiduidade; ?></th>
            <th width="50" style="vertical-align: top">ORGANIZAÇÃO: <?php echo $avaliacao->organizacao; ?></th>
            <th width="50" style="vertical-align: top">DISCIPLINA: <?php echo $avaliacao->disciplina; ?></th>
            <th width="50" style="vertical-align: top">RELACIONAMENTO: <?php echo $avaliacao->relacionamento; ?></th>
        </tr>
        <tr>
            <th width="50" style="vertical-align: top">METODOLOGIA: <?php echo $avaliacao->metodologia; ?></th>
            <th width="50" style="vertical-align: top">AVALIAÇÃO: <?php echo $avaliacao->avaliacao; ?></th>
            <th width="50" style="vertical-align: top">DESENVOLVIMENTO P.: <?php echo $avaliacao->desenvolvimento; ?></th>
            <th width="50" style="vertical-align: top">COMPROMISSO I.: <?php echo $avaliacao->compromisso; ?></th>
            <th width="50" style="vertical-align: top">ÉTICA: <?php echo $avaliacao->etica; ?></th>
        </tr>
        <tr>
            <th colspan="5">Total: <?php echo $avaliacao->total; ?></th>
        </tr>
    </thead>
</table>
<?php $this->load->view('footer'); ?>