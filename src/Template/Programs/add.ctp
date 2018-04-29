<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Program $program
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Programs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Workouts'), ['controller' => 'Workouts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workout'), ['controller' => 'Workouts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="programs form large-9 medium-8 columns content">
    <?= $this->Form->create($program) ?>
    <fieldset>
        <legend><?= __('Add Program') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->input('trainer_id', ['type' => 'select', 'empty' => '-- Select Trainer --', 'options' => $users['trainer']]);
            echo $this->Form->label('client_id', 'Athlete', ['class' => $this->request->getQuery('id') ? 'hide' : false]);
            echo $this->Form->control('client_id', ['label' => false, 'options' => $users['athlete'], 'default' => $this->request->getQuery('id'), 'class' => $this->request->getQuery('id') ? 'hide' : false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
