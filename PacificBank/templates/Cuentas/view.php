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
            <?= $this->Html->link(__('Edit Cuenta'), ['action' => 'edit', $cuenta->ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cuenta'), ['action' => 'delete', $cuenta->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $cuenta->ID), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cuentas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cuenta'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cuentas view content">
            <h3><?= h($cuenta->IBAN) ?></h3>
            <table>
                <tr>
                    <th><?= __('IBAN') ?></th>
                    <td><?= h($cuenta->IBAN) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($cuenta->ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('UsuarioID') ?></th>
                    <td><?= $cuenta->UsuarioID === null ? '' : $this->Number->format($cuenta->UsuarioID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Saldo') ?></th>
                    <td><?= $cuenta->Saldo === null ? '' : $this->Number->format($cuenta->Saldo) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
