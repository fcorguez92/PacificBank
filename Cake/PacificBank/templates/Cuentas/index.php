<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cuenta> $cuentas
 */
?>
<div class="cuentas index content">
    <?= $this->Html->link(__('New Cuenta'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cuentas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('UsuarioID') ?></th>
                    <th><?= $this->Paginator->sort('IBAN') ?></th>
                    <th><?= $this->Paginator->sort('Saldo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cuentas as $cuenta): ?>
                <tr>
                    <td><?= $this->Number->format($cuenta->ID) ?></td>
                    <td><?= $cuenta->UsuarioID === null ? '' : $this->Number->format($cuenta->UsuarioID) ?></td>
                    <td><?= h($cuenta->IBAN) ?></td>
                    <td><?= $cuenta->Saldo === null ? '' : $this->Number->format($cuenta->Saldo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cuenta->ID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cuenta->ID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cuenta->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $cuenta->ID)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
