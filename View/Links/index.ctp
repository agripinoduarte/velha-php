<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('Hosts Monitorados');?></h2>

		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de um total e {:count}, começando no registro {:start}, terminando em {:end}')));?>
		</p>
		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('ip_address', __('IP'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('hostname', __('Nome do Host'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('location', __('Localização'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('carrier', __('Ultima Atualização'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('status', __('Status'));?></th>
				<th class="actions"><?php echo __('Ações');?></th>
			</tr>
		<?php foreach ($links as $link): ?>
			<tr>
				<td><?php echo h($link['Link']['ip_address']); ?>&nbsp;</td>
				<td><?php echo h($link['Link']['hostname']); ?>&nbsp;</td>
				<td><?php echo h($link['Link']['carrier']); ?>&nbsp;</td>
				<td><?php echo h($link['Link']['modified']); ?>&nbsp;</td>
				<td><?php echo $link['Link']['active']? 'Ativo' : 'Inativo'; ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver Info.'), array('action' => 'view', $link['Link']['id'])); ?>
					<?php echo $this->Html->link(__('Histórico'), array('controller' => 'logs', 'action' => 'report', $link['Link']['id'])); ?>
					<?php echo $this->Html->link(__('Alterar'), array('action' => 'edit', $link['Link']['id'])); ?>
					<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $link['Link']['id']), null, __('Tem certeza que deseja excluir o registro?')); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>

		<?php echo $this->BootstrapPaginator->pagination(); ?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Ações'); ?></li>
			<li><?php echo $this->Html->link(__('Novo Host'), array('action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>
