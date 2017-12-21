<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>

<div class="row">
    <div class="col-xs-12">
    <h3><?= h($user->id) ?></h3>
    <br>
    <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary btn-sm', 'title' => 'Edit User', 'escape' => false]) ?>&nbsp;&nbsp;
    <?= $this->Form->postLink(__('<i class="fa fa-minus"></i>'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'title' => 'Delete User', 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>&nbsp;&nbsp;  
    <?= $this->Html->link(__('<i class="fa fa-list"></i>'), ['action' => 'index'], ['title' => 'List Users', 'class' => 'btn btn-primary btn-sm', 'escape' => false]) ?><br>
    <br>
    </div>
</div>



    
        
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Email') ?>
    </div>
    <div class="col-xs-10">
        <?= h($user->email) ?>
    </div>
</div>    

        
        
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Password') ?>
    </div>
    <div class="col-xs-10">
        <?= h($user->password) ?>
    </div>
</div>    

        
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Group') ?>
    </div>
    <div class="col-xs-10">
        <?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?>
    </div>
</div>

        
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('First Name') ?>
    </div>
    <div class="col-xs-10">
        <?= h($user->first_name) ?>
    </div>
</div>    

        
        
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Last Name') ?>
    </div>
    <div class="col-xs-10">
        <?= h($user->last_name) ?>
    </div>
</div>    

        
        
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Avatar') ?>
    </div>
    <div class="col-xs-10">
        <?= h($user->avatar) ?>
    </div>
</div>    

        
 



<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Id') ?>
    </div>
    <div class="col-xs-10">
        <?= $this->Number->format($user->id) ?>
    </div>
</div>
        
    
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Created') ?>
    </div>
    <div class="col-xs-10">
        <?= h($user->created) ?>
    </div>
</div>  

    
<div class="row">
    <div class="col-xs-12"><br></div>
</div>



