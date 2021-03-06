<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program $program
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Program'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Edit Program'), ['action' => 'edit', $program->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Program'), ['action' => 'delete', $program->id], ['confirm' => __('Are you sure you want to delete # {0}?', $program->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workouts'), ['controller' => 'Workouts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workout'), ['controller' => 'Workouts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="programs view large-9 medium-8 columns content">
    <h3><?= h($program->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($program->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($program->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($program->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Trainer Name') ?></th>
            <td><?= $program->trainer->full_name ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Client Name') ?></th>
            <td><?= $program->client->full_name ?>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($program->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($program->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Workouts') ?></h4>
        <?php if (!empty($program->workouts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Program Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($program->workouts as $workouts): ?>
            <tr>
                <td><?= h($workouts->id) ?></td>
                <td><?= h($workouts->title) ?></td>
                <td><?= h($workouts->description) ?></td>
                <td><?= h($workouts->program_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Workouts', 'action' => 'view', $workouts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Workouts', 'action' => 'edit', $workouts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Workouts', 'action' => 'delete', $workouts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workouts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
