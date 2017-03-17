<?php $this->load->view('header'); ?>
<a href="<?php echo base_url('index.php/disciplina/nova/'); ?>" class="btn btn-success">NOVA</a><br/><br/>
<?php echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success')); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width='40'>ID</th>
            <th>NOME</th>
            <th width='50'></th>
            <th width='50'></th>
        </tr>
    </thead>
    <?php foreach ($disciplinas as $disciplina) { ?>
        <tr>
            <td><?php echo $disciplina->id; ?></td>
            <td><?php echo $disciplina->nome; ?></td>
            <td><?php echo anchor('index.php/disciplina/editar/' . $disciplina->id, 'Editar', array('class' => 'btn btn-info')) ?></td>
            <td><?php echo anchor('index.php/disciplina/apagar/' . $disciplina->id, 'Apagar', array('class' => 'btn btn-danger')) ?></td>
        </tr>
    <?php } ?>
</table>
<?php $this->load->view('footer'); ?>