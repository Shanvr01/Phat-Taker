<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Workout $workout
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workout'), ['action' => 'edit', $workout->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workout'), ['action' => 'delete', $workout->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workout->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workouts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workout'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Programs'), ['controller' => 'Programs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Program'), ['controller' => 'Programs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Exercises'), ['controller' => 'Exercises', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Exercise'), ['controller' => 'Exercises', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workouts view large-9 medium-8 columns content">
    <h3><?= h($workout->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($workout->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($workout->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Program') ?></th>
            <td><?= $workout->has('program') ? $this->Html->link($workout->program->title, ['controller' => 'Programs', 'action' => 'view', $workout->program->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($workout->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Exercises') ?></h4>
        <?php if (!empty($workout->exercises)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($workout->exercises as $exercises): ?>
            <tr>
                <td><?= h($exercises->id) ?></td>
                <td><?= h($exercises->title) ?></td>
                <td><?= h($exercises->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Exercises', 'action' => 'view', $exercises->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Exercises', 'action' => 'edit', $exercises->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Exercises', 'action' => 'delete', $exercises->id], ['confirm' => __('Are you sure you want to delete # {0}?', $exercises->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
