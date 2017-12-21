<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $user
 */
?>

<div class="row">
    <div class="col-xs-12">
        <h3><?= __('Add User') ?></h3>
    </div>
</div>    
    <?= $this->Form->create($user,  ['horizontal' => true]) ?>
    <fieldset>
        
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('group_id', ['options' => $groups]);
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('avatar');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit', ['class' => 'btn btn-success'])) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
