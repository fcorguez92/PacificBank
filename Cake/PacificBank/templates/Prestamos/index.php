<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Prestamo> $prestamos
 */
?>
<div class="prestamos index content">
    <?= $this->Html->link(__('New Prestamo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Prestamos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('UsuarioID') ?></th>
                    <th><?= $this->Paginator->sort('Monto') ?></th>
                    <th><?= $this->Paginator->sort('TasaInteres') ?></th>
                    <th><?= $this->Paginator->sort('CuotasTotales') ?></th>
                    <th><?= $this->Paginator->sort('CuotasRestantes') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?= $this->Number->format($prestamo->ID) ?></td>
                    <td><?= $prestamo->UsuarioID === null ? '' : $this->Number->format($prestamo->UsuarioID) ?></td>
                    <td><?= $this->Number->format($prestamo->Monto) ?></td>
                    <td><?= $this->Number->format($prestamo->TasaInteres) ?></td>
                    <td><?= $this->Number->format($prestamo->CuotasTotales) ?></td>
                    <td><?= $this->Number->format($prestamo->CuotasRestantes) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $prestamo->ID]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prestamo->ID]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prestamo->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $prestamo->ID)]) ?>
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
