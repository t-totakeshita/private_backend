<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Prefecture $prefecture
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Prefecture'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="prefecture form large-9 medium-8 columns content">
    <?= $this->Form->create($prefecture) ?>
    <fieldset>
        <legend><?= __('Add Prefecture') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('CREATE_AT');
            echo $this->Form->control('UPDATE_AT');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
