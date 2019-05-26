<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prefecture $prefecture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Prefecture'), ['action' => 'edit', $prefecture->prefecture_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Prefecture'), ['action' => 'delete', $prefecture->prefecture_id], ['confirm' => __('Are you sure you want to delete # {0}?', $prefecture->prefecture_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Prefecture'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Prefecture'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="prefecture view large-9 medium-8 columns content">
    <h3><?= h($prefecture->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($prefecture->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prefecture Id') ?></th>
            <td><?= $this->Number->format($prefecture->prefecture_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('CREATE AT') ?></th>
            <td><?= h($prefecture->CREATE_AT) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('UPDATE AT') ?></th>
            <td><?= h($prefecture->UPDATE_AT) ?></td>
        </tr>
    </table>
</div>
