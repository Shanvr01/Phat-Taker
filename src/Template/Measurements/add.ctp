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
            echo $this->Form->label('user_id', 'User', ['class' => $this->request->getQuery('id') ? 'hide' : false]);
            echo $this->Form->control('user_id', ['label' => false, 'options' => $users, 'default' => $this->request->getQuery('id'), 'class' => $this->request->getQuery('id') ? 'hide' : false]);
            echo $this->Form->control('user_height', ['label' => 'User Height (cm)']);
            echo $this->Form->control('user_weight', ['label' => 'User Weight (kg)']);
            echo $this->Form->control('user_bodyfat', ['label' => 'User Body Fat (%)']);
            echo $this->Form->control('user_notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
