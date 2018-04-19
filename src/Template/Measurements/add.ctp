<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Measurement $measurement
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Measurements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="measurements form large-9 medium-8 columns content">
    <?= $this->Form->create($measurement) ?>
    <fieldset>
        <legend><?= __('Add Measurement') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('user_age');
            echo $this->Form->control('user_gender');
            echo $this->Form->control('user_height');
            echo $this->Form->control('user_weight');
            echo $this->Form->control('user_bodyfat');
            echo $this->Form->control('user_notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
