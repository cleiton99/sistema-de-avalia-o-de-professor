<?php $this->load->view('header'); ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th width='40'>ID</th>
            <th>NOME</th>
            <th width='50'></th>
        </tr>
    </thead>
    <?php foreach ($disciplinas as $disciplina) { ?>
        <tr>
            <td><?php echo $disciplina->id; ?></td>
            <td><?php echo $disciplina->nome; ?></td>
            <td><?php echo anchor('index.php/relatorio/disciplina/' . $disciplina->id, 'Gerar PDF', array('class' => 'btn btn-info')) ?></td>
        </tr>
    <?php } ?>
</table>
<?php $this->load->view('footer'); ?>