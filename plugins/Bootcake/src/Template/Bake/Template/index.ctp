<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
%>
<?php
/**
 * @var \<%= $namespace %>\View\AppView $this
 * @var \<%= $entityClass %>[]|\Cake\Collection\CollectionInterface $<%= $pluralVar %>
 */
?>
<%
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return !in_array($schema->columnType($field), ['binary', 'text']);
    });

if (isset($modelObject) && $modelObject->behaviors()->has('Tree')) {
    $fields = $fields->reject(function ($field) {
        return $field === 'lft' || $field === 'rght';
    });
}

if (!empty($indexColumns)) {
    $fields = $fields->take($indexColumns);
}

%>

<div class="row">
    <div class="col-xs-12">
        <h3><?= __('<%= $pluralHumanName %>') ?></h3>
        <br>
        <?= $this->Html->link(__('<i class="fa fa-plus"></i>'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm', 'title' => 'New <%= $singularHumanName %>', 'escape' => false]) ?> &nbsp;&nbsp;<br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
    <% foreach ($fields as $field): %>
                    <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
    <% endforeach; %>
                    <th><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
                <tr>
    <%        foreach ($fields as $field) {
                $isKey = false;
                if (!empty($associations['BelongsTo'])) {
                    foreach ($associations['BelongsTo'] as $alias => $details) {
                        if ($field === $details['foreignKey']) {
                            $isKey = true;
    %>
                    <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
    <%
                            break;
                        }
                    }
                }
                if ($isKey !== true) {
                    if (!in_array($schema->columnType($field), ['integer', 'float', 'decimal', 'biginteger', 'smallinteger', 'tinyinteger'])) {
    %>
                    <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
    <%
                    } else {
    %>
                    <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
    <%
                    }
                }
            }

            $pk = '$' . $singularVar . '->' . $primaryKey[0];
    %>
                    <td class="actions">
                        <?= $this->Html->link(__('<i class="fa fa-eye"></i>'), ['action' => 'view', <%= $pk %>], ['class' => 'btn btn-default', 'title' => 'View', 'escape' => false]) ?>
                        <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', <%= $pk %>], ['class' => 'btn btn-default', 'title' => 'Edit', 'escape' => false]) ?>
                        <?= $this->Form->postLink(__('<i class="fa fa-minus"></i>'), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>), 'class' => 'btn btn-danger', 'title' => 'Delete', 'escape' => false]) ?>
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
