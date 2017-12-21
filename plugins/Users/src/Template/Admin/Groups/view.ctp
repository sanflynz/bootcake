<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $group
 */
?>

<div class="row">
    <div class="col-xs-12">
    <h3><?= h($group->name) ?></h3>
    <br>
    <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $group->id], ['class' => 'btn btn-primary btn-sm', 'title' => 'Edit Group', 'escape' => false]) ?>&nbsp;&nbsp;
    <?= $this->Form->postLink(__('<i class="fa fa-minus"></i>'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id), 'title' => 'Delete Group', 'class' => 'btn btn-danger btn-sm', 'escape' => false]) ?>&nbsp;&nbsp;  
    <?= $this->Html->link(__('<i class="fa fa-list"></i>'), ['action' => 'index'], ['title' => 'List Groups', 'class' => 'btn btn-primary btn-sm', 'escape' => false]) ?><br>
    <br>
    </div>
</div>



    
        
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Name') ?>
    </div>
    <div class="col-xs-10">
        <?= h($group->name) ?>
    </div>
</div>    

        
 



<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Id') ?>
    </div>
    <div class="col-xs-10">
        <?= $this->Number->format($group->id) ?>
    </div>
</div>
        
    
<div class="row">
    <div class="col-xs-2 text-right">
        <?= __('Created') ?>
    </div>
    <div class="col-xs-10">
        <?= h($group->created) ?>
    </div>
</div>  

    
<div class="row">
    <div class="col-xs-12"><br></div>
</div>


    <div class="row">
        <div class="col-xs-12">
        
            <?php if (!empty($group->users)): ?>
            <h4><?= __('Related Users') ?></h4>
            <table class="table table-hover">
                <tr>
                        <th ><?= __('Id') ?></th>
                        <th ><?= __('Email') ?></th>
                        <th ><?= __('Password') ?></th>
                        <th ><?= __('Group Id') ?></th>
                        <th ><?= __('First Name') ?></th>
                        <th ><?= __('Last Name') ?></th>
                        <th ><?= __('Avatar') ?></th>
                        <th ><?= __('Created') ?></th>
                        <th ><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($group->users as $users): ?>
                <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->password) ?></td>
                    <td><?= h($users->group_id) ?></td>
                    <td><?= h($users->first_name) ?></td>
                    <td><?= h($users->last_name) ?></td>
                    <td><?= h($users->avatar) ?></td>
                    <td><?= h($users->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['controller' => 'Users', 'action' => 'view', $users->id], ['class' => 'btn btn-default btn-sm', 'title' => 'View', 'escape' => false]) ?>
                        <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['controller' => 'Users', 'action' => 'edit', $users->id], ['class' => 'btn btn-default btn-sm', 'title' => 'Edit', 'escape' => false]) ?>
                        <?= $this->Form->postLink(__('<i class="fa fa-minus"></i>'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'class' => 'btn btn-success btn-sm', 'title' => 'Delete', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
        </div>
    </div>

