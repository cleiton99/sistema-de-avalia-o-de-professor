<?php $this->load->view('header'); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width='40'>ID</th>
            <th>NOME</th>
            <th width='50'></th>
        </tr>
    </thead>
    <?php foreach ($series as $serie) { ?>
        <tr>
            <td><?php echo $serie->id; ?></td>
            <td><?php echo $serie->nome; ?></td>
            <td><?php echo anchor('index.php/relatorio/serie/' . $serie->id, 'Gerar PDF', array('class' => 'btn btn-info')) ?></td>
        </tr>
    <?php } ?>
</table>
<?php $this->load->view('footer'); ?>