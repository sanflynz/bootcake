<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $group
 */
?>

<div class="row">
    <div class="col-xs-12">
        <h3><?= __('Edit Group') ?></h3>
    </div>
</div>    
    <?= $this->Form->create($group,  ['horizontal' => true]) ?>
    <fieldset>
        
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit', ['class' => 'btn btn-success'])) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
