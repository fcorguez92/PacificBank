<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Transaccione> $transacciones
 */
?>
<div class="transacciones index content">
    <?= $this->Html->link(__('New Transaccione'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transacciones') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('UsuarioRemitenteID') ?></th>
                    <th><?= $this->Paginator->sort('UsuarioDestinatarioID') ?></th>
                    <th><?= $this->Paginator->sort('Monto') ?></th>
                    <th><?= $this->Paginator->sort('FechaTransaccion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transacciones as $transaccione): ?>
                <tr>
                    <td><?= $this->Number->format($transaccione->ID) ?></td>
                    <td><?= $transaccione->UsuarioRemitenteID === null ? '' : $this->Number->format($transaccione->UsuarioRemitenteID) ?></td>
                    <td><?= $transaccione->UsuarioDestinatarioID === null ? '' : $this->Number->format($transaccione->UsuarioDestinatarioID) ?></td>
                    <td><?= $this->Number->format($transaccione->Monto) ?></td>
                    <td><?= h($transaccione->FechaTransaccion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transaccione->ID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transaccione->ID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transaccione->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $transaccione->ID)]) ?>
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
