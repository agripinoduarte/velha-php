<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('Link', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Edit %s', __('Link')); ?></legend>
				<?php
				echo $this->BootstrapForm->input('ip_address', array(
					'label' => __('Endereço IP'),
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Required') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('hostname', array(
					'label' => __('Nome do Host')
				));
				echo $this->BootstrapForm->input('phone', array(
					'label' => __('Telefone')
				));
				echo $this->BootstrapForm->input('carrier', array(
					'label' => __('Operadora'),
					'required' => 'required',
				));
				echo $this->BootstrapForm->input('email', array(
					'label' => __('E-mail de Contato'),
					'required' => 'required',
				));
				echo $this->BootstrapForm->input('location', array(
					'label' => __('Localização'),
				));
				echo $this->BootstrapForm->input('period_start', array(
					'label' => __('Inicio do Monitoramento'),
					'class' => 'datepicker',
				));
				echo $this->BootstrapForm->input('period_end', array(
					'label' => __('Fim do Monitoramento'),
				));
				echo $this->BootstrapForm->input('token', array(
					'label' => __('Token'),
				));
				echo $this->BootstrapForm->hidden('id');
				?>
				<?php echo $this->BootstrapForm->submit(__('Submit'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<div class="span3">
		<div class="well" style="padding: 8px 0; margin-top:8px;">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Ações'); ?></li>
			<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Link.id')), null, __('Tem certeza que deseja excluir o registro?')); ?></li>
			<li><?php echo $this->Html->link(__('Listar'), array('action' => 'index'));?></li>
		</ul>
		</div>
	</div>
</div>
