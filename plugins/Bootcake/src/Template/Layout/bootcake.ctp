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

$cakeDescription = 'BootCake';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min') ?>
     <?= $this->Html->css('font-awesome.min') ?>
     <?= $this->Html->css('bootcake') ?>

     


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $this->request->webroot; ?>"><i class="fa fa-birthday-cake"></i> &nbsp;BootCake</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Plugins <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="">List</a></li>
                    <li><a href="">Plugins </a></li>
                </ul>
            </li>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->request->webroot; ?>users/">Users</a></li>
                    <li><a href="<?php echo $this->request->webroot; ?>groups/">Groups</a></li>
                </ul>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo $this->request->webroot; ?>users/login">Log in</a></li>
                <li><a href="#">Register</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Profile</a></li>
                <li><a href="<?php echo $this->request->webroot; ?>users/logout">Log out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <?= $this->Flash->render() ?>
    
        <?= $this->fetch('content') ?>
    </div>
    
    <footer>
    </footer>

    <?= $this->Html->script('jquery-3.2.1.min'); ?>
    <?= $this->Html->script('bootstrap.min'); ?>
    <?= $this->Html->script('bootcake.js'); ?>
    
    <?= $this->fetch('script') ?>
</body>
</html>
