<div class="row-fluid">
	<div class="span9">
		<h2><?php echo __('Usuários');?></h2>
		<p>
			<?php echo $this->BootstrapPaginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de um total de {:count},começando no registro {:start}, terminando em {:end}')));?>
		</p>

		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<th><?php echo $this->BootstrapPaginator->sort('name', __('Nome'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('username', __('Usuário'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('email', __('E-mail'));?></th>
				<th><?php echo $this->BootstrapPaginator->sort('phone', __('Telefone'));?></th>
				<th class="actions"><?php echo __('Ações');?></th>
			</tr>
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
				<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Ver Info.'), array('action' => 'view', $user['User']['id'])); ?>
					<?php echo $this->Html->link(__('Alterar'), array('action' => 'edit', $user['User']['id'])); ?>
					<?php echo $this->Form->postLink(__('Excluir'),
						array('action' => 'delete', $user['User']['id']),
						null,
						__('Tem certeza que deseja excluir o registro?')
					);
				?>
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
			<li><?php echo $this->Html->link(__('Novo Usuário'), array('action' => 'add')); ?></li>
		</ul>
		</div>
	</div>
</div>
