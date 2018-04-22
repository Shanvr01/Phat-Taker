<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="row">
    <div class="small-12 columns">
        <div class="users form">
            <?= $this->Flash->render('auth') ?>
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Please enter your username and password') ?></legend>
                <?= $this->Form->control('email') ?>
                <?= $this->Form->control('password') ?>
            </fieldset>
            <?= $this->Form->button(__('Login')); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
