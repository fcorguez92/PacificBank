<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaccione $transaccione
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $transaccione->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $transaccione->ID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Transacciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="transacciones form content">
            <?= $this->Form->create($transaccione) ?>
            <fieldset>
                <legend><?= __('Edit Transaccione') ?></legend>
                <?php
                    echo $this->Form->control('UsuarioRemitenteID');
                    echo $this->Form->control('UsuarioDestinatarioID');
                    echo $this->Form->control('Monto');
                    echo $this->Form->control('FechaTransaccion');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
