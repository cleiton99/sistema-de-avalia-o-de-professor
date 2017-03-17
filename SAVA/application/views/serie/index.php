<?php $this->load->view('header'); ?>
<a href="<?php echo base_url('index.php/serie/nova/'); ?>" class="btn btn-success">NOVA</a><br/><br/>
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
    <?php foreach ($series as $serie) { ?>
        <tr>
            <td><?php echo $serie->id; ?></td>
            <td><?php echo $serie->nome; ?></td>
            <td><?php echo anchor('index.php/serie/editar/' . $serie->id, 'Editar', array('class' => 'btn btn-info')) ?></td>
            <td><?php echo anchor('index.php/serie/apagar/' . $serie->id, 'Apagar', array('class' => 'btn btn-danger')) ?></td>
        </tr>
    <?php } ?>
</table>
<?php $this->load->view('footer'); ?>