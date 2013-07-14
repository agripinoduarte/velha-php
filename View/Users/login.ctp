<div class="row-fluid">
    <div class="span9">
        <?php echo $this->BootstrapForm->create('User', array('class' => 'form-horizontal'));?>
            <fieldset>
                <legend><?php echo __('Iniciar Sessão'); ?></legend>
                <?php
                echo $this->BootstrapForm->input('username', array(
                    'label' => __('Nome de Usuário'),
                ));
                echo $this->BootstrapForm->input('password', array(
                    'label' => __('Senha'),
                ));

                ?>
                <a href="/users/add">Cadastre-se</a>
                <?php echo $this->BootstrapForm->submit(__('Login'));?>
            </fieldset>
        <?php echo $this->BootstrapForm->end();?>
    </div>
</div>
