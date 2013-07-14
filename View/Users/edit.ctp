<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Alterar Dados do Usuário'); ?></legend>
				<?php
				echo $this->BootstrapForm->input('name', array(
					'label' => __('Nome'),
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Obrigatório') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('username', array(
					'label' => __('Login'),
					'required' => 'required',
					'autocomplete' => 'off',
					'helpInline' => '<span class="label label-important">' . __('Obrigatório') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('password', array(
					'label' => __('Senha'),
					'autocomplete' => 'off',
					'type' => 'password'
				));
				echo $this->BootstrapForm->input('email', array(
					'label' => __('E-mail'),
					'type' => 'email'
				));
				echo $this->BootstrapForm->input('phone', array(
					'label' => __('Telefone'),
				));
				echo $this->BootstrapForm->input('group');
				echo $this->BootstrapForm->input('active', array(
					'label' => __('Ativo'),
					'options' => array('Não', 'Sim'),
					'type' => 'radio'
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
			<li class="nav-header"><?php echo __('Actions'); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List %s', __('Users')), array('action' => 'index'));?></li>
		</ul>
		</div>
	</div>
</div>
