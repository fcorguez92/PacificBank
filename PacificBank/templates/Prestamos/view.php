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
            <?= $this->Html->link(__('Edit Prestamo'), ['action' => 'edit', $prestamo->ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Prestamo'), ['action' => 'delete', $prestamo->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->ID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Prestamos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Prestamo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="prestamos view content">
            <h3><?= h($prestamo->ID) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($prestamo->ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UsuarioID') ?></th>
                    <td><?= $prestamo->UsuarioID === null ? '' : $this->Number->format($prestamo->UsuarioID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monto') ?></th>
                    <td><?= $this->Number->format($prestamo->Monto) ?></td>
                </tr>
                <tr>
                    <th><?= __('TasaInteres') ?></th>
                    <td><?= $this->Number->format($prestamo->TasaInteres) ?></td>
                </tr>
                <tr>
                    <th><?= __('CuotasTotales') ?></th>
                    <td><?= $this->Number->format($prestamo->CuotasTotales) ?></td>
                </tr>
                <tr>
                    <th><?= __('CuotasRestantes') ?></th>
                    <td><?= $this->Number->format($prestamo->CuotasRestantes) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
