<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Measurement[]|\Cake\Collection\CollectionInterface $measurements
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Measurement'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="measurements index large-9 medium-8 columns content">
    <h3><?= __('Measurements') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_height') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_bodyfat') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($measurements as $measurement): ?>
            <tr>
                <td><?= $this->Number->format($measurement->id) ?></td>
                <td><?= $measurement->has('user') ? $this->Html->link($measurement->user->id, ['controller' => 'Users', 'action' => 'view', $measurement->user->id]) : '' ?></td>
                <td><?= $this->Number->format($measurement->user_height) ?></td>
                <td><?= $this->Number->format($measurement->user_weight) ?></td>
                <td><?= $this->Number->format($measurement->user_bodyfat) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $measurement->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $measurement->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $measurement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measurement->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
