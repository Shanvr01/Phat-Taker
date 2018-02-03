<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Exercise $exercise
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $exercise->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $exercise->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Exercises'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Workouts'), ['controller' => 'Workouts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workout'), ['controller' => 'Workouts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exercises form large-9 medium-8 columns content">
    <?= $this->Form->create($exercise) ?>
    <fieldset>
        <legend><?= __('Edit Exercise') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('description');
            echo $this->Form->control('workouts._ids', ['options' => $workouts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
