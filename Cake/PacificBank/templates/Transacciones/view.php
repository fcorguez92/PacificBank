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
            <?= $this->Html->link(__('Edit Transaccione'), ['action' => 'edit', $transaccione->ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transaccione'), ['action' => 'delete', $transaccione->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $transaccione->ID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transacciones'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transaccione'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="transacciones view content">
            <h3><?= h($transaccione->ID) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($transaccione->ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UsuarioRemitenteID') ?></th>
                    <td><?= $transaccione->UsuarioRemitenteID === null ? '' : $this->Number->format($transaccione->UsuarioRemitenteID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UsuarioDestinatarioID') ?></th>
                    <td><?= $transaccione->UsuarioDestinatarioID === null ? '' : $this->Number->format($transaccione->UsuarioDestinatarioID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Monto') ?></th>
                    <td><?= $this->Number->format($transaccione->Monto) ?></td>
                </tr>
                <tr>
                    <th><?= __('FechaTransaccion') ?></th>
                    <td><?= h($transaccione->FechaTransaccion) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
