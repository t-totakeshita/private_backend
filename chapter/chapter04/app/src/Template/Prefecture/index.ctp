<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prefecture[]|\Cake\Collection\CollectionInterface $prefecture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Prefecture'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="prefecture index large-9 medium-8 columns content">
    <h3><?= __('Prefecture') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('prefecture_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('CREATE_AT') ?></th>
                <th scope="col"><?= $this->Paginator->sort('UPDATE_AT') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prefecture as $prefecture): ?>
            <tr>
                <td><?= $this->Number->format($prefecture->prefecture_id) ?></td>
                <td><?= h($prefecture->name) ?></td>
                <td><?= h($prefecture->CREATE_AT) ?></td>
                <td><?= h($prefecture->UPDATE_AT) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $prefecture->prefecture_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $prefecture->prefecture_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $prefecture->prefecture_id], ['confirm' => __('Are you sure you want to delete # {0}?', $prefecture->prefecture_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
