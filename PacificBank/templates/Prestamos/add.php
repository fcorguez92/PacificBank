<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prestamo $prestamo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Prestamos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="prestamos form content">
            <?= $this->Form->create($prestamo) ?>
            <fieldset>
                <legend><?= __('Add Prestamo') ?></legend>
                <?php
                    echo $this->Form->control('UsuarioID');
                    echo $this->Form->control('Monto');
                    echo $this->Form->control('TasaInteres');
                    echo $this->Form->control('CuotasTotales');
                    echo $this->Form->control('CuotasRestantes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
