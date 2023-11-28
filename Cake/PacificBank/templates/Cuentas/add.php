<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cuenta $cuenta
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cuentas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cuentas form content">
            <?= $this->Form->create($cuenta) ?>
            <fieldset>
                <legend><?= __('Add Cuenta') ?></legend>
                <?php
                    echo $this->Form->control('UsuarioID');
                    echo $this->Form->control('IBAN');
                    echo $this->Form->control('Saldo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>