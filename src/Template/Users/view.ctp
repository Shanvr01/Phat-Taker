<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Program'), ['controller' => 'Programs', 'action' => 'add', '?' => ['id' => $user->id]]) ?> </li>
        <li><?= $this->Html->link(__('New Measurement'), ['controller' => 'Measurements', 'action' => 'add', '?' => ['id' => $user->id]]) ?> </li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->full_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->title, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->full_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $user->gender_title ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Of Birth') ?></th>
            <td><?= h($user->date_of_birth) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Programs') ?></h4>
        <?php if (!empty($user->programs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Trainer Id') ?></th>
                <th scope="col"><?= __('Client Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->programs as $programs): ?>
            <tr>
                <td><?= h($programs->id) ?></td>
                <td><?= h($programs->title) ?></td>
                <td><?= h($programs->description) ?></td>
                <td><?= h($programs->created) ?></td>
                <td><?= h($programs->modified) ?></td>
                <td><?= h($programs->trainer_id) ?></td>
                <td><?= h($programs->client_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Programs', 'action' => 'view', $programs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Programs', 'action' => 'edit', $programs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Programs', 'action' => 'delete', $programs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $programs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Measurements') ?></h4>
        <?php if (!empty($user->measurements)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Height (cm)') ?></th>
                <th scope="col"><?= __('User Weight (kg)') ?></th>
                <th scope="col"><?= __('User Body Fat (%)') ?></th>
                <th scope="col"><?= __('User Notes') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->measurements as $measurements): ?>
            <tr>
                <td><?= h($measurements->id) ?></td>
                <td><?= h($measurements->user_height) ?></td>
                <td><?= h($measurements->user_weight) ?></td>
                <td><?= h($measurements->user_bodyfat) ?></td>
                <td><?= h($measurements->user_notes) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Measurements', 'action' => 'edit', $measurements->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Measurements', 'action' => 'delete', $measurements->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measurements->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
