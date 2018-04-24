<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'Phat Taker: the rapid fat loss framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('app.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
</head>
<body class="home">

<header class="header">
    <div class="header-image logo">
        <?= $this->Html->link(
                $this->Html->image('phat_taker_logo.png'), '/', array('escape' => false)
            );
        ?>
    </div>
</header>
<nav class="top-bar expanded" data-topbar role="navigation">
    <div class="top-bar-section">
        <ul class="right">
            <?php if($loggedIn): ?>
                <li><a href="/users/logout">Sign Out</a></li>
            <?php else: ?>
                <li><a href="/users/login">Sign In</a></li>
            <?php endif; ?>            
        </ul>
    </div>
</nav>

<div class="row">
    <?php if($loggedIn): ?>

        <?php if($isTrainer): ?>
            <div class="small-10 small-centered columns text-center">
                <h1>Phat Taker</h1>
                <div class="program-blocks row">
                    <div class="small-6 columns">
                        <h3>
                            Manage Users
                        </h3>
                    </div>
    
                    <div class="small-6 columns">
                        <?= $this->Html->link('View User details', ['controller' => 'users', 'action' => 'index'], array('class' => 'button')) ?>
                    </div>
                </div>
            </div>
        <?php else: ?>        
            <div class="small-12 columns text-center">
                <h1>Phat Taker</h1>
                <p class="greeting">Hi <?= $user['first_name'] ?>&hellip;</p>
                <div class="row">
                    <div class="small-12 columns">
                        <h2><?= $this->Html->link('View your profile', ['controller' => 'users', 'action' => 'view', $user['id']], array('class' => 'button')) ?></h2>
                    </div>
                </div>

                <h2>Latest Programs</h2>

                <div class="row">
                    <?php if (!$programs->isEmpty()): ?>
                        <?php foreach($programs as $program): ?>
                            <div class="small-12 medium-6 large-4 columns end">
                                <div class="program-blocks">
                                    <h3>
                                        <?= $program['title'] ?>
                                        <div class="line"></div>
                                    </h3>
                                    
                                    <p>Primary objective:</p>
                                    <p><?= $program['description'] ?></p>

                                    <?= $this->Html->link('View program', ['controller' => 'programs', 'action' => 'view', $program['id']], array('class' => 'button')) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>You don't have any programs assigned to you yet.</p>
                    <?php endif ?>
                </div>
            </div>
        <?php endif; ?>
        
    <?php else: ?>
        <div class="small-12 medium-6 columns text-center program-blocks margin-top">
            <h2>To start your fitness journey click below:</h2>
            <?= $this->Html->link('Register', '/register', ['class' => 'button']) ?>
        </div>

        <div class="small-12 medium-6 columns text-center program-blocks">
            <h2>To continue getting swole:</h2>
            <?= $this->Html->link('Login', '/login', ['class' => 'button']) ?>
        </div>
    <?php endif; ?>
</div>

<?= $this->Html->script('app.js') ?>

</body>
</html>
