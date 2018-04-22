<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
   
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Register') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
        ?>
        <div class="input date">
            <label>Date of Birth</label>
            <?= $this->Form->date('date_of_birth', ['empty' => true, 'minYear' => date('Y', strtotime('-80 years'))]) ?>
        </div>
        <?php
            echo $this->Form->input('gender', ['options' => $genders, 'empty' => '- Select -']);
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
