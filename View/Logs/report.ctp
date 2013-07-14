<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('Visualizar Histórico do Link');?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Pagina {:page} de {:pages}, {:current} registros')));?>
		</p>

		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('created', __('Registrado em'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('description', __('Descrição'));?></th>
			</tr>
		<?php foreach ($logs as $log): ?>
			<tr>
				<td><?php echo h($log['Log']['created']); ?>&nbsp;</td>
				<td><?php echo h($log['Log']['description']); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
</div>
