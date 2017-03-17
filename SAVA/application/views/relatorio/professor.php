<?php $this->load->view('header'); ?>
<?php echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success')); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width='40'>ID</th>
            <th>NOME</th>
            <th>DISCIPLINA</th>
            <th>SÉRIE</th>
            <th width='50'></th>
        </tr>
    </thead>
    <?php foreach ($professores as $professor) { ?>
        <tr>
            <td><?php echo $professor->id; ?></td>
            <td><?php echo $professor->nome; ?></td>
            <td><?php echo $professor->disciplina->nome; ?></td>
            <td><?php echo $professor->serie->nome; ?></td>
            <td><?php echo anchor('index.php/relatorio/professor/' . $professor->id, 'Gerar PDF', array('class' => 'btn btn-info')) ?></td>
        </tr>
    <?php } ?>
</table>
<?php $this->load->view('footer'); ?>