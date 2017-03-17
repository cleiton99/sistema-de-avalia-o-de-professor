<?php $this->load->view('header'); ?>
<a href="<?php echo base_url('index.php/aluno/novo/'); ?>" class="btn btn-success">NOVO</a><br/><br/>
<?php echo MSG::getAlertMensagemClose(MSG::ALERT_SUCCESS, $this->session->flashdata('success')); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width='40'>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th width='50'></th>
            <th width='50'></th>
        </tr>
    </thead>
    <?php foreach ($alunos as $aluno) { ?>
        <tr>
            <td><?php echo $aluno->id; ?></td>
            <td><?php echo $aluno->nome; ?></td>
            <td><?php echo $aluno->email; ?></td>
            <td><?php echo anchor('index.php/aluno/editar/' . $aluno->id, 'Editar', array('class' => 'btn btn-info')) ?></td>
            <td><?php echo anchor('index.php/aluno/apagar/' . $aluno->id, 'Apagar', array('class' => 'btn btn-danger')) ?></td>
        </tr>
    <?php } ?>
</table>
<?php $this->load->view('footer'); ?>