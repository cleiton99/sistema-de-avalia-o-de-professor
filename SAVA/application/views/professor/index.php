<?php $this->load->view('header'); ?>
<a href="<?php echo base_url('index.php/professor/novo/'); ?>" class="btn btn-success">NOVO</a><br/><br/>
<?php echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success')); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width='40'>ID</th>
            <th>NOME</th>
            <th>SÉRIE</th>
            <th>DISCIPLINA</th>
            <th width='50'></th>
            <th width='50'></th>
        </tr>
    </thead>
    <?php foreach ($professores as $professor) { ?>
        <tr>
            <td><?php echo $professor->id; ?></td>
            <td><?php echo $professor->nome; ?></td>
            <td><?php echo $professor->serie->nome; ?></td>
            <td><?php echo $professor->disciplina->nome; ?></td>
            <td><?php echo anchor('index.php/professor/editar/' . $professor->id, 'Editar', array('class' => 'btn btn-info')) ?></td>
            <td><?php echo anchor('index.php/professor/apagar/' . $professor->id, 'Apagar', array('class' => 'btn btn-danger')) ?></td>
        </tr>
    <?php } ?>
</table>
<?php $this->load->view('footer'); ?>