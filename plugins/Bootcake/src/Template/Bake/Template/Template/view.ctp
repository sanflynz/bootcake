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
 * @var \<%= $entityClass %> $<%= $singularVar %>
 */
?>
<%
use Cake\Utility\Inflector;

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'];
$associationFields = collection($fields)
    ->map(function($field) use ($immediateAssociations) {
        foreach ($immediateAssociations as $alias => $details) {
            if ($field === $details['foreignKey']) {
                return [$field => $details];
            }
        }
    })
    ->filter()
    ->reduce(function($fields, $value) {
        return $fields + $value;
    }, []);

$groupedFields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    })
    ->groupBy(function($field) use ($schema, $associationFields) {
        $type = $schema->columnType($field);
        if (isset($associationFields[$field])) {
            return 'string';
        }
        if (in_array($type, ['decimal', 'biginteger', 'integer', 'float', 'smallinteger', 'tinyinteger'])) {
            return 'number';
        }
        if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
            return 'date';
        }
        return in_array($type, ['text', 'boolean']) ? $type : 'string';
    })
    ->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>

<div class="row">
    <div class="col-xs-12">
    <h3><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h3>

    <?= $this->Html->link(__('<i class="fa fa-pencil"></i>'), ['action' => 'edit', <%= $pk %>], ['class' => 'btn btn-primary', 'title' => 'Edit <%= $singularHumanName %>', 'escape' => false]) ?>&nbsp;&nbsp;
    <?= $this->Form->postLink(__('<i class="fa fa-minus"></i>'), ['action' => 'delete', <%= $pk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>), 'title' => 'Delete <%= $singularHumanName %>', 'class' => 'btn btn-danger', 'escape' => false]) ?>
    <?= $this->Html->link(__('<i class="fa fa-list"></i>'), ['action' => 'index'], ['title' => 'List <%= $pluralHumanName %>', 'class' => 'btn btn-primary', 'escape' => false]) ?>
    </div>
</div>



    
<% if ($groupedFields['string']) : %>
<% foreach ($groupedFields['string'] as $field) : %>
<% if (isset($associationFields[$field])) :
            $details = $associationFields[$field];
%>
<div class="row">
    <div class="col-xs-3">
        <?= __('<%= Inflector::humanize($details['property']) %>') ?>
    </div>
    <div class="col-xs-9">
        <?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?>
    </div>
</div>

<% else : %>
        
<div class="row">
    <div class="col-xs-3">
        <?= __('<%= Inflector::humanize($field) %>') ?>
    </div>
    <div class="col-xs-9">
        <?= h($<%= $singularVar %>-><%= $field %>) ?>
    </div>
</div>    

        
<% endif; %>
<% endforeach; %>
<% endif; %> 


<% if ($associations['HasOne']) : %>
    <%- foreach ($associations['HasOne'] as $alias => $details) : %>


<div class="row">
    <div class="col-xs-3">
        <?= __('<%= Inflector::humanize(Inflector::singularize(Inflector::underscore($alias))) %>') ?>
    </div>
    <div class="col-xs-9">
        <?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?>
    </div>
</div>  

    <%- endforeach; %>
<% endif; %>
<% if ($groupedFields['number']) : %>
<% foreach ($groupedFields['number'] as $field) : %>

<div class="row">
    <div class="col-xs-3">
        <?= __('<%= Inflector::humanize($field) %>') ?>
    </div>
    <div class="col-xs-9">
        <?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?>
    </div>
</div>
        
<% endforeach; %>
<% endif; %>
<% if ($groupedFields['date']) : %>
<% foreach ($groupedFields['date'] as $field) : %>
    
<div class="row">
    <div class="col-xs-3">
        <%= "<%= __('" . Inflector::humanize($field) . "') %>" %>
    </div>
    <div class="col-xs-9">
        <?= h($<%= $singularVar %>-><%= $field %>) ?>
    </div>
</div>  

<% endforeach; %>
<% endif; %>
<% if ($groupedFields['boolean']) : %>
<% foreach ($groupedFields['boolean'] as $field) : %>
    
<div class="row">
    <div class="col-xs-3">
        <?= __('<%= Inflector::humanize($field) %>') ?>
    </div>
    <div class="col-xs-9">
        <?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?>
    </div>
</div>

        
<% endforeach; %>
<% endif; %>
    


<% if ($groupedFields['text']) : %>
<% foreach ($groupedFields['text'] as $field) : %>
    <div class="row">
        <h4><?= __('<%= Inflector::humanize($field) %>') ?></h4>
        <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
    </div>
<% endforeach; %>
<% endif; %>
<%
$relations = $associations['HasMany'] + $associations['BelongsToMany'];
foreach ($relations as $alias => $details):
    $otherSingularVar = Inflector::variable($alias);
    $otherPluralHumanName = Inflector::humanize(Inflector::underscore($details['controller']));
    %>
    <div class="related">
        <h4><?= __('Related <%= $otherPluralHumanName %>') ?></h4>
        <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
<% foreach ($details['fields'] as $field): %>
                <th scope="col"><?= __('<%= Inflector::humanize($field) %>') ?></th>
<% endforeach; %>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
            <tr>
            <%- foreach ($details['fields'] as $field): %>
                <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
            <%- endforeach; %>
            <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %>]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
<% endforeach; %>

