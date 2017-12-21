<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $groups
 */
?>

<div class="row">
    <div class="col-xs-12">
        <h3><?= __('Groups') ?></h3>
        <br>
        <?= $this->Html->link(__('<i class="fa fa-plus"></i>'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm', 'title' => 'New Group', 'escape' => false]) ?> &nbsp;&nbsp;<br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('created') ?></th>
                        <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($groups as $group): ?>
                <tr>
                        <td><?= $this->Number->format($group->id) ?></td>
                        <td><?= h($group->name) ?></td>
                        <td><?= h($group->created) ?></td>
                        <td class="actions">
                        <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', $group->id], ['class' => 'btn btn-default', 'title' => 'View', 'escape' => false]) ?>
                        <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', $group->id], ['class' => 'btn btn-default', 'title' => 'Edit', 'escape' => false]) ?>
                        <?= $this->Form->postLink(__('<i class="fa fa-minus"></i>'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id), 'class' => 'btn btn-danger', 'title' => 'Delete', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <? $this->Paginator->setTemplates([
                'number' => '<a href="{{url}}" role="button" class="btn btn-default">{{text}}</a>',
                'first' => '<a href="{{url}}" role="button" class="btn btn-default">&laquo;</a>',
                'prevActive' => '<a href="{{url}}" role="button" class="btn btn-default">&lsaquo;</a>',
                'prevDisabled' => '<a href="{{url}}" role="button" class="btn btn-default disabled">&lsaquo;</a>',
                'nextActive' => '<a href="{{url}}" role="button" class="btn btn-default">&rsaquo;</a>',
                'nextDisabled' => '<a href="{{url}}" role="button" class="btn btn-default disabled">&rsaquo;</a>',
                'last' => '<a href="{{url}}" role="button" class="btn btn-default">&raquo;</a>'
                ]); ?>
        <div class="btn-group" role="group">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
        </div>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

        
        </div>
    </div>
</div>
