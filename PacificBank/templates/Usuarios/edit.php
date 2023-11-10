<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $usuario->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $usuario->ID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios form content">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Edit Usuario') ?></legend>
                <?php
                    echo $this->Form->control('Username');
                    echo $this->Form->control('Password');
                    echo $this->Form->control('UserType');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
