<div class="row-fluid">
	<div class="span9">
		<h2><?php  echo __('Visualizar Link');?></h2>
		<dl>
			<dt><?php echo __('Endereço IP'); ?></dt>
			<dd>
				<?php echo h($link['Link']['ip_address']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Nome do Host'); ?></dt>
			<dd>
				<?php echo h($link['Link']['hostname']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Telefone'); ?></dt>
			<dd>
				<?php echo h($link['Link']['phone']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Operadora'); ?></dt>
			<dd>
				<?php echo h($link['Link']['carrier']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Localização'); ?></dt>
			<dd>
				<?php echo h($link['Link']['location']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Inicio do Monitoramento'); ?></dt>
			<dd>
				<?php echo h($link['Link']['period_start']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Fim do Monitoramento'); ?></dt>
			<dd>
				<?php echo h($link['Link']['period_end']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Token'); ?></dt>
			<dd>
				<?php echo h($link['Link']['token']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('E-mail de Contato'); ?></dt>
			<dd>
				<?php echo h($link['Link']['email']); ?>
				&nbsp;
			</dd>
		</dl>
		<fieldset>
		<legend>Histórico</legend>
		<table class="table table-striped table-bordered table-condensed">
			<tr>
				<td>Data</td>
				<td>Descrição</td>
			</tr>
			<?php
				foreach ($link['Log'] as $log) {
			?>
				<tr>
					<td><?php echo $log['created']?></td>
					<td><?php echo $log['description']?></td>
				</tr>
			<?php
				}
			?>
		</table>
	</fieldset>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Ações'); ?></li>
			<li><?php echo $this->Html->link(__('Altera'), array('action' => 'edit', $link['Link']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $link['Link']['id']), null, __('Tem certeza que deseja excluir o registro?')); ?> </li>
			<li><?php echo $this->Html->link(__('Listar'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Novo'), array('action' => 'add')); ?> </li>
		</ul>
		</div>
	</div>
</div>

