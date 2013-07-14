<div class="row-fluid">
	<div class="span9">
		<?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal'));?>
			<fieldset>
				<legend><?php echo __('Novo Usuário'); ?></legend>
				<?php
				echo $this->BootstrapForm->input('name', array(
					'label' => __('Nome'),
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Obrigatório') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('username', array(
					'label' => __('Usuário'),
					'required' => 'required',
					'helpInline' => '<span class="label label-important">' . __('Obrigatório') . '</span>&nbsp;')
				);
				echo $this->BootstrapForm->input('password', array(
					'label' => __('Senha'),
					'type' => 'password'
				));
				?>
				<?php echo $this->BootstrapForm->submit(__('Registrar'));?>
			</fieldset>
		<?php echo $this->BootstrapForm->end();?>
	</div>
	<a href="/users/login">Login</a>
</div>
