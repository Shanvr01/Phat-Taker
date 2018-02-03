<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workout[]|\Cake\Collection\CollectionInterface $workouts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workout'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Programs'), ['controller' => 'Programs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Program'), ['controller' => 'Programs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workouts index large-9 medium-8 columns content">
    <h3><?= __('Workouts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('program_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workouts as $workout): ?>
            <tr>
                <td><?= $this->Number->format($workout->id) ?></td>
                <td><?= h($workout->title) ?></td>
                <td><?= h($workout->description) ?></td>
                <td><?= $workout->has('program') ? $this->Html->link($workout->program->title, ['controller' => 'Programs', 'action' => 'view', $workout->program->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workout->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workout->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workout->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workout->id)]) ?>
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
