<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Measurement $measurement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Measurement'), ['action' => 'edit', $measurement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Measurement'), ['action' => 'delete', $measurement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $measurement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Measurements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Measurement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="measurements view large-9 medium-8 columns content">
    <h3><?= h($measurement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $measurement->has('user') ? $this->Html->link($measurement->user->id, ['controller' => 'Users', 'action' => 'view', $measurement->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($measurement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Height') ?></th>
            <td><?= $this->Number->format($measurement->user_height) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Weight') ?></th>
            <td><?= $this->Number->format($measurement->user_weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Bodyfat') ?></th>
            <td><?= $this->Number->format($measurement->user_bodyfat) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('User Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($measurement->user_notes)); ?>
    </div>
</div>
